<?php

namespace App\Http\Controllers\Api;


use App\Helpers\SavbitsHelper;
use App\Http\Controllers\Controller;
use App\SuApplication;
use App\Ticket;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;


class TicketController extends Controller
{
    //
    public function index(Request $request){
        try {
            $data = SavbitsHelper::listing(Ticket::class, $request)->process();
            return jsonRes(true, "All ticket", $data, 200);
        }catch (\Throwable $exception){
            \log::error($exception);
            return jsonRes(false, $exception->getMessage(), [], 500);
        }
    }

    public function store(Request $request, SuApplication $suApplication){
        try  {
            $this->validate($request,[
                'title' => 'required|string',
                'description' => 'string',
                'reporter_name' => 'nullable|string',
                'reporter_email' => 'nullable|email',
            ]);

            if (\Auth::check()) {
                $user = \Auth::user();
            } else {
                $user = null;
            }

            $ticket = new Ticket();
            $ticket->reference_number = uniqid();//place holder
            $ticket->title = $request->get('title');
            $ticket->description = $request->get('description');

            if ($user) {
                $ticket->reporter_name = $user->name;
                $ticket->reporter_email = $user->email;
                $ticket->creator()->associate($user);
            } else {
                $this->validate($request, [
                    'reporter_name' => 'required|string',
                    'reporter_email' => 'required|email',
                ]);
                $ticket->reporter_name = $request->get('reporter_name');
                $ticket->reporter_email = $request->get('reporter_email');
            }

            $ticket->suApplication()->associate($suApplication);
            $ticket->saveOrFail();
            $ticket->reference_number = "TICKET-".str_pad($ticket->id,3, "0",STR_PAD_LEFT);
            $ticket->saveOrFail();

            // At this point, trigger an event that will automatically send an email to the ticketing system systems@strathmore.edu

            return jsonRes(true, "Ticket saved successfully", $ticket,200);
        } catch (ValidationException $e) {
            \Log::error($e);
            return jsonRes(false, $e->validator->getMessageBag()->first(),$e->errors(),422);

        } catch (AuthorizationException $e) {
            \Log::error($e);
            return jsonRes(false, $e->getMessage(),[],403);
        } catch (\Throwable $exception) {
            \Log::error($exception);
            return jsonRes(false, $exception->getMessage(),[],500);
        }
    }
    public function update(Request $request){

    }

}
