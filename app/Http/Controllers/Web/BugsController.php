<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Bug\BulkDestroyBug;
use App\Http\Requests\Web\Bug\DestroyBug;
use App\Http\Requests\Web\Bug\IndexBug;
use App\Http\Requests\Web\Bug\StoreBug;
use App\Http\Requests\Web\Bug\UpdateBug;
use App\Bug;
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

class BugsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexBug $request
     * @return array|Factory|View
     */
    public function index(IndexBug $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Bug::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'reference_number', 'title', 'resolved', 'created_by', 'resolved_by', 'resolved_at'],

            // set columns to searchIn
            ['id', 'reference_number', 'title', 'description']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('frontend.bug.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('bug.create');

        return view('frontend.bug.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreBug $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreBug $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Bug
        $bug = Bug::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('bugs'), 'message' => trans('strathmore/admin-ui::admin.operation.succeeded')];
        }

        return redirect(url('/bugs'));
    }

    /**
     * Display the specified resource.
     *
     * @param Bug $bug
     * @throws AuthorizationException
     * @return void
     */
    public function show(Bug $bug)
    {
        $this->authorize('bug.show', $bug);

        
                return view('frontend.bug.show', [
        'bug' => $bug,
                ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Bug $bug
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Bug $bug)
    {
        $this->authorize('bug.edit', $bug);


        return view('frontend.bug.edit', [
            'bug' => $bug,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateBug $request
     * @param Bug $bug
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateBug $request, Bug $bug)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Bug
        $bug->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('bugs'),
                'message' => trans('strathmore/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect(url('/bugs'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyBug $request
     * @param Bug $bug
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyBug $request, Bug $bug)
    {
        abort(403, "Deleting is not allowed at the moment");
        $bug->delete();

        if ($request->ajax()) {
            return response(['message' => trans('strathmore/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyBug $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyBug $request) : Response
    {
        abort(403, "Bulk Deleting is not allowed at the moment");
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Bug::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('strathmore/admin-ui::admin.operation.succeeded')]);
    }
}
