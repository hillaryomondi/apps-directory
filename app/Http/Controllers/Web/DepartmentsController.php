<?php

namespace App\Http\Controllers\Web;

use App\Helpers\SavbitsHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Department\BulkDestroyDepartment;
use App\Http\Requests\Web\Department\DestroyDepartment;
use App\Http\Requests\Web\Department\IndexDepartment;
use App\Http\Requests\Web\Department\StoreDepartment;
use App\Http\Requests\Web\Department\UpdateDepartment;
use App\Department;
use Savannabits\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DepartmentsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexDepartment $request
     * @return array|Factory|View
     */
    public function index(IndexDepartment $request)
    {
        // create and AdminListing instance for a specific model and
        $data = SavbitsHelper::listing(Department::class, $request)->customQuery(function($q) {
            //TODO: Insert your query modification here
        })->process();

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('web.department.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('department.create');

        return view('web.department.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreDepartment $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreDepartment $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Department
        $department = new Department($sanitized);
        $department->saveOrFail();
        if ($request->ajax()) {
            return ['redirect' => url('departments'), 'message' => trans('savannabits/admin-ui::admin.operation.succeeded')];
        }

        return redirect(url('/departments'));
    }

    /**
     * Display the specified resource.
     *
     * @param Department $department
     * @throws AuthorizationException
     * @return void
     */
    public function show(Department $department)
    {
        $this->authorize('department.show', $department);


        return view('web.department.show', [
        'department' => $department,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Department $department
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Department $department)
    {
        $this->authorize('department.edit', $department);


        return view('web.department.edit', [
            'department' => $department,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateDepartment $request
     * @param Department $department
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateDepartment $request, Department $department)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Department
        $department->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('departments'),
                'message' => trans('savannabits/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect(url('/departments'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyDepartment $request
     * @param Department $department
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyDepartment $request, Department $department)
    {
        abort(403, "Deleting is not allowed at the moment");
        $department->delete();

        if ($request->ajax()) {
            return response(['message' => trans('savannabits/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyDepartment $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyDepartment $request) : Response
    {
        abort(403, "Bulk Deleting is not allowed at the moment");
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Department::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('savannabits/admin-ui::admin.operation.succeeded')]);
    }
}
