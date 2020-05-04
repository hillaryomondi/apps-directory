<?php

namespace App\Http\Controllers\Api;

use App\SuApplication;
use App\Helpers\SavbitsHelper;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SuApplicationController extends Controller
{
    //
    public function index(Request $request){
        try {
            $data = SavbitsHelper::listing(SuApplication::class, $request)->process();
            return jsonRes(true, "All Strathmore Applications", $data, 200);

        }catch (\Throwable $exception){
            \log::error($exception);
            return jsonRes(false, $exception->getMessage(), [], 500);

        }

    }
    public function get(Request $request, SuApplication $suApplication){

    }
    public function update(Request $request, SuApplication $suApplication){
        try {

        }catch (ValidationException $exception){

        }catch(AuthorizationException $exception){

        }catch(\Throwable $exception){

        }
    }
}
