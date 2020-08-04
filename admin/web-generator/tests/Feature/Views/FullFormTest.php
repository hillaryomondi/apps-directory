<?php

namespace Savannabits\WebGenerator\Tests\Feature\Views;

use Savannabits\WebGenerator\Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\File;

class FullFormTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function view_full_form_should_get_auto_generated(): void
    {
        $formPath = resource_path('views/admin/category/form.blade.php');
        $formJsPath = resource_path('js/admin/category/Form.js');

        $this->assertFileNotExists($formPath);
        $this->assertFileNotExists($formJsPath);

        $this->artisan('web:generate:full-form', [
            'table_name' => 'categories'
        ]);

        $this->assertFileExists($formPath);
        $this->assertFileExists($formJsPath);
        $this->assertStringStartsWith('@extends(\'web.layout.base.layout.default\')', File::get($formPath));
        $this->assertStringStartsWith('import AppForm from \'../app-components/Form/AppForm\';

Vue.component(\'category-form\', {
    mixins: [AppForm]', File::get($formJsPath));
    }

    /** @test */
    public function you_can_pass_your_own_file_path(): void
    {
        $formPath = resource_path('views/admin/profile/edit-password.blade.php');
        $formJsPath = resource_path('js/admin/profile-edit-password/Form.js');

        $this->assertFileNotExists($formPath);
        $this->assertFileNotExists($formJsPath);

        $this->artisan('web:generate:full-form', [
            'table_name' => 'categories',
            '--file-name' => 'profile/edit-password'
        ]);

        $this->assertFileExists($formPath);
        $this->assertFileExists($formJsPath);
        $this->assertStringStartsWith('@extends(\'web.layout.base.layout.default\')', File::get($formPath));
        $this->assertStringContainsString(':action="\'{{ route(\'admin/profile/edit-password\', [\'category\' => $category]) }}\'"',
            File::get($formPath));
        $this->assertStringStartsWith('import AppForm from \'../app-components/Form/AppForm\';

Vue.component(\'profile-edit-password-form\', {
    mixins: [AppForm]', File::get($formJsPath));
    }
}