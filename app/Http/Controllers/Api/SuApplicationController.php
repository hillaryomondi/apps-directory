<?php

namespace App\Http\Controllers\Api;

use App\Department;
use App\Http\Requests\Web\SuApplication\IndexSuApplication;
use App\Role;
use App\SuApplication;
use App\Helpers\SavbitsHelper;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\Builder;
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
            \Log::error($exception);
            return jsonRes(false, $exception->getMessage(), [], 500);

        }
    }
    public function show(SuApplication $suApplication, Request $request){
        try{


            $suApplication->load('department');
            return jsonRes( $suApplication, 200);

            //$suApplication->department()->associate($department);


        }
        catch (\Throwable $exception){
            \Log::error($exception);
            return jsonRes(false, $exception->getMessage(), [], 500);
        }

    }
    public function search(Request $request) {
        try {
            $results = SavbitsHelper::listing(SuApplication::class, $request)->customQuery(function($q) {
                /**@var SuApplication|Builder $q*/
                $q
                    //where the app is not private
                        // Or where->(app is private)->where(app has roles-> {where role->id is in [Auth::user()->roles()->pluck('id')]})
                    ->where("private", "=", false)
                    ->orWhere(function($builder) {
                        /**@var SuApplication|Builder $builder*/
                        $builder->where('private', "=", true)
                            ->whereHas('roles', function($builder1) {
                                /**@var Role|Builder $builder1*/
                                if (\Auth::check()) {
                                    $userRoles = \Auth::user()->roles->pluck('id');
                                } else {
                                    $userRoles = [];
                                }
                                $builder1->whereIn("id",$userRoles);
                            });
                    })
                    ->with(['department']);


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
