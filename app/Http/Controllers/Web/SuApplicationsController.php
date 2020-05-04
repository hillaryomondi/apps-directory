<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\SuApplication\BulkDestroySuApplication;
use App\Http\Requests\Web\SuApplication\DestroySuApplication;
use App\Http\Requests\Web\SuApplication\IndexSuApplication;
use App\Http\Requests\Web\SuApplication\StoreSuApplication;
use App\Http\Requests\Web\SuApplication\UpdateSuApplication;
use App\SuApplication;
use Strathmore\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class SuApplicationsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexSuApplication $request
     * @return array|Factory|View
     */
    public function index(IndexSuApplication $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(SuApplication::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'name', 'enabled', 'department_id'],

            // set columns to searchIn
            ['id', 'name', 'description']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('frontend.su-application.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('su-application.create');

        return view('frontend.su-application.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSuApplication $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreSuApplication $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the SuApplication
        $suApplication = SuApplication::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('su-applications'), 'message' => trans('strathmore/admin-ui::admin.operation.succeeded')];
        }

        return redirect(url('/su-applications'));
    }

    /**
     * Display the specified resource.
     *
     * @param SuApplication $suApplication
     * @throws AuthorizationException
     * @return void
     */
    public function show(SuApplication $suApplication)
    {
        $this->authorize('su-application.show', $suApplication);

        
                return view('frontend.su-application.show', [
        'suApplication' => $suApplication,
                ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param SuApplication $suApplication
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(SuApplication $suApplication)
    {
        $this->authorize('su-application.edit', $suApplication);


        return view('frontend.su-application.edit', [
            'suApplication' => $suApplication,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSuApplication $request
     * @param SuApplication $suApplication
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateSuApplication $request, SuApplication $suApplication)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values SuApplication
        $suApplication->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('su-applications'),
                'message' => trans('strathmore/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect(url('/su-applications'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroySuApplication $request
     * @param SuApplication $suApplication
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroySuApplication $request, SuApplication $suApplication)
    {
        abort(403, "Deleting is not allowed at the moment");
        $suApplication->delete();

        if ($request->ajax()) {
            return response(['message' => trans('strathmore/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroySuApplication $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroySuApplication $request) : Response
    {
        abort(403, "Bulk Deleting is not allowed at the moment");
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    SuApplication::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('strathmore/admin-ui::admin.operation.succeeded')]);
    }
}
