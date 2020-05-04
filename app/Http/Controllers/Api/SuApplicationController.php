<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Web\SuApplication\IndexSuApplication;
use App\SuApplication;
use App\Helpers\SavbitsHelper;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Matrix\Builder;

class SuApplicationController extends Controller
{
    //
    public function index(Request $request){
        try {
            $data = SavbitsHelper::listing(SuApplication::class, $request)->process();
            return jsonRes(true, "All Strathmore Applications", $data, 200);

        }catch (\Throwable $exception){
            \Log::error($exception);
            return jsonRes(false, $exception->getMessage(), [], 500);

        }
    }
    public function search(IndexSuApplication $request) {
        try {
            $results = SavbitsHelper::listing(SuApplication::class, $request)->customQuery(function($q) {
                /**@var SuApplication|Builder $q*/
                $q->with(['department']);

            })->process();
            return jsonRes(true, "Search Results", $results);
        } catch (AuthorizationException $exception) {
            return jsonRes(false, $exception->getMessage(),[], 403);
        } catch (\Illuminate\Database\QueryException $exception) {
            \Log::error($exception);
            return jsonRes(false, $exception->errorInfo[2], [], 402);
        } catch (\Throwable $exception) {
            \Log::error($exception);
            return jsonRes(false, $exception->getMessage(), [], 400);
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
