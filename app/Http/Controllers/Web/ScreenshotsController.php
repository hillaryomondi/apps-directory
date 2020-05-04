<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Screenshot\BulkDestroyScreenshot;
use App\Http\Requests\Web\Screenshot\DestroyScreenshot;
use App\Http\Requests\Web\Screenshot\IndexScreenshot;
use App\Http\Requests\Web\Screenshot\StoreScreenshot;
use App\Http\Requests\Web\Screenshot\UpdateScreenshot;
use App\Screenshot;
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

class ScreenshotsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexScreenshot $request
     * @return array|Factory|View
     */
    public function index(IndexScreenshot $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Screenshot::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'file_path'],

            // set columns to searchIn
            ['id', 'file_path']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('frontend.screenshot.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('screenshot.create');

        return view('frontend.screenshot.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreScreenshot $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreScreenshot $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Screenshot
        $screenshot = Screenshot::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('screenshots'), 'message' => trans('strathmore/admin-ui::admin.operation.succeeded')];
        }

        return redirect(url('/screenshots'));
    }

    /**
     * Display the specified resource.
     *
     * @param Screenshot $screenshot
     * @throws AuthorizationException
     * @return void
     */
    public function show(Screenshot $screenshot)
    {
        $this->authorize('screenshot.show', $screenshot);

        
                return view('frontend.screenshot.show', [
        'screenshot' => $screenshot,
                ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Screenshot $screenshot
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Screenshot $screenshot)
    {
        $this->authorize('screenshot.edit', $screenshot);


        return view('frontend.screenshot.edit', [
            'screenshot' => $screenshot,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateScreenshot $request
     * @param Screenshot $screenshot
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateScreenshot $request, Screenshot $screenshot)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Screenshot
        $screenshot->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('screenshots'),
                'message' => trans('strathmore/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect(url('/screenshots'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyScreenshot $request
     * @param Screenshot $screenshot
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyScreenshot $request, Screenshot $screenshot)
    {
        abort(403, "Deleting is not allowed at the moment");
        $screenshot->delete();

        if ($request->ajax()) {
            return response(['message' => trans('strathmore/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyScreenshot $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyScreenshot $request) : Response
    {
        abort(403, "Bulk Deleting is not allowed at the moment");
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Screenshot::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('strathmore/admin-ui::admin.operation.succeeded')]);
    }
}
