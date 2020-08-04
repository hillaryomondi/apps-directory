<?php

namespace App\Http\Controllers\Web;

use App\Helpers\SavbitsHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Ticket\BulkDestroyTicket;
use App\Http\Requests\Web\Ticket\DestroyTicket;
use App\Http\Requests\Web\Ticket\IndexTicket;
use App\Http\Requests\Web\Ticket\StoreTicket;
use App\Http\Requests\Web\Ticket\UpdateTicket;
use App\Ticket;
use Savannabits\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class TicketsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexTicket $request
     * @return array|Factory|View
     */
    public function index(IndexTicket $request)
    {
        // create and AdminListing instance for a specific model and
        $data = SavbitsHelper::listing(Ticket::class, $request)->customQuery(function($q) {
            //TODO: Insert your query modification here
            /**
             * @var Builder $q
             */
            $q->with(['suApplication', 'creator']);
            
        })->process();

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('web.ticket.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('ticket.create');

        return view('web.ticket.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTicket $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreTicket $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Ticket
        $ticket = new Ticket($sanitized);
        $ticket->saveOrFail();
        if ($request->ajax()) {
            return ['redirect' => url('tickets'), 'message' => trans('savannabits/admin-ui::admin.operation.succeeded')];
        }

        return redirect(url('/tickets'));
    }

    /**
     * Display the specified resource.
     *
     * @param Ticket $ticket
     * @throws AuthorizationException
     * @return void
     */
    public function show(Ticket $ticket)
    {
        $this->authorize('ticket.show', $ticket);


        return view('web.ticket.show', [
        'ticket' => $ticket,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Ticket $ticket
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Ticket $ticket)
    {
        $this->authorize('ticket.edit', $ticket);


        return view('web.ticket.edit', [
            'ticket' => $ticket,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTicket $request
     * @param Ticket $ticket
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateTicket $request, Ticket $ticket)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Ticket
        $ticket->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('tickets'),
                'message' => trans('savannabits/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect(url('/tickets'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyTicket $request
     * @param Ticket $ticket
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyTicket $request, Ticket $ticket)
    {
        abort(403, "Deleting is not allowed at the moment");
        $ticket->delete();

        if ($request->ajax()) {
            return response(['message' => trans('savannabits/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyTicket $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyTicket $request) : Response
    {
        abort(403, "Bulk Deleting is not allowed at the moment");
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Ticket::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('savannabits/admin-ui::admin.operation.succeeded')]);
    }
}
