<?php

namespace App\Http\Controllers\Api;


use App\Helpers\SavbitsHelper;
use App\Http\Controllers\Controller;
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

    public function store(Request $request, Ticket $ticket){



    }
    public function update(Request $request){

    }

}
