<?php namespace Strathmore\WebGenerator;

use Strathmore\WebGenerator\Generate\Traits\FileManipulations;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;

class GenerateUser extends Command {

    use FileManipulations;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'web:generate:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scaffold complete admin CRUD for specified user model. This differs from web:generate command in many additional features (password handling, roles, ...).';

    /**
     * Create a new controller creator command instance.
     *
     * @param  \Illuminate\Filesystem\Filesystem  $files
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $tableNameArgument = 'users';
        $modelOption = $this->option('model-name');
        $controllerOption = $this->option('controller-name');
        $generateModelOption = $this->option('generate-model');
        $exportOption = $this->option('with-export');
        $force = $this->option('force');

        if($force) {
            //remove all files
            if($generateModelOption) {
                $this->files->delete(app_path('Models/User.php'));
            }
            if($exportOption){
                $this->files->delete(app_path('Exports/UsersExport.php'));
            }
            $this->files->delete(app_path('Http/Controllers/Admin/UsersController.php'));
            $this->files->deleteDirectory(app_path('Http/Requests/Admin/User'));
            $this->files->deleteDirectory(resource_path('js/admin/user'));
            $this->files->deleteDirectory(resource_path('views/admin/user'));

            $this->info('Deleting previous files finished.');
        }

        if($generateModelOption) {
            $this->call('web:generate:model', [
                'table_name' => $tableNameArgument,
                'class_name' => $modelOption,
                '--template' => 'user',
                '--belongs-to-many' => 'roles',
            ]);

            //TODO change config/auth.php to use our user model for auth
        }

        // we need to replace this before controller generation happens
        $this->strReplaceInFile(
            resource_path('views/frontend/layout/sidebar.blade.php'),
            '|url\(\'\/users\'\)|',
            '{{-- Do not delete me :) I\'m also used for auto-generation menu items --}}',
            '<li class="nav-item"><a class="nav-link" href="{{ url(\'users\') }}"><i class="nav-icon icon-user"></i> {{ __(\'Manage users\') }}</a></li>
            {{-- Do not delete me :) I\'m also used for auto-generation menu items --}}');

        $this->call('web:generate:controller', [
            'table_name' => $tableNameArgument,
            'class_name' => $controllerOption,
            '--model-name' => $modelOption,
            '--template' => 'user',
            '--belongs-to-many' => 'roles',
            '--with-export' => $exportOption,
        ]);

        $this->call('web:generate:request:index', [
            'table_name' => $tableNameArgument,
            '--model-name' => $modelOption,
        ]);

        $this->call('web:generate:request:store', [
            'table_name' => $tableNameArgument,
            '--model-name' => $modelOption,
            '--template' => 'user',
            '--belongs-to-many' => 'roles',
        ]);

        $this->call('web:generate:request:update', [
            'table_name' => $tableNameArgument,
            '--model-name' => $modelOption,
            '--template' => 'user',
            '--belongs-to-many' => 'roles',
        ]);

        $this->call('web:generate:request:destroy', [
            'table_name' => $tableNameArgument,
            '--model-name' => $modelOption,
        ]);

        $this->call('web:generate:routes', [
            'table_name' => $tableNameArgument,
            '--model-name' => $modelOption,
            '--controller-name' => $controllerOption,
            '--template' => 'user',
            '--with-export' => $exportOption,
        ]);

        $this->call('web:generate:index', [
            'table_name' => $tableNameArgument,
            '--model-name' => $modelOption,
            '--template' => 'user',
            '--with-export' => $exportOption,
        ]);

        $this->call('web:generate:form', [
            'table_name' => $tableNameArgument,
            '--model-name' => $modelOption,
            '--belongs-to-many' => 'roles',
            '--template' => 'user',
        ]);

        $this->call('web:generate:lang', [
            'table_name' => $tableNameArgument,
            '--model-name' => $modelOption,
            '--template' => 'user',
            '--belongs-to-many' => 'roles',
            '--with-export' => $exportOption,
        ]);

        $this->call('web:generate:factory', [
            'table_name' => $tableNameArgument,
            '--model-name' => $modelOption,
            '--template' => 'user',
        ]);

        if($exportOption){
            $this->call('web:generate:export', [
                'table_name' => $tableNameArgument,
                '--force' => $force,
            ]);
        }

        if ($this->option('seed')) {
            $this->info('Seeding testing data');
            factory($this->modelFullName, 20)->create();
        }

        $this->info('Generating whole user admin finished');

    }

    protected function getArguments() {
        return [
        ];
    }

    protected function getOptions() {
        return [
            ['model-name', 'm', InputOption::VALUE_OPTIONAL, 'Specify custom model name'],
            ['controller-name', 'c', InputOption::VALUE_OPTIONAL, 'Specify custom controller name'],
            ['generate-model', 'g', InputOption::VALUE_NONE, 'Generates model'],

            ['force', 'f', InputOption::VALUE_NONE, 'Force will delete files before regenerating admin user'],
            ['seed', 's', InputOption::VALUE_NONE, 'Seeds table with fake data'],
            ['with-export', 'e', InputOption::VALUE_NONE, 'Generate an option to Export as Excel'],
        ];
    }

}
