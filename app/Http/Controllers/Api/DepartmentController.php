<?php

namespace App\Http\Controllers\Api;

use App\Department;
use App\Helpers\SavbitsHelper;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class DepartmentController extends Controller
{
    //
    public function index(Request $request){
        try {
            $data = SavbitsHelper::listing(Department::class, $request)->process();
            return jsonRes(true, "All departments", $data, 200);
        }catch (\Throwable $exception){
            \log::error($exception);
            return jsonRes(false, $exception->getMessage(), [], 500);
        }

    }

    public function get(Request $request, Department $department){

    }
    public function update(Request $request, Department $department){
        try {

        }catch (ValidationException $exception){

        }catch (AuthorizationException $exception){

        }catch (\Throwable $exception){

        }
    }
}
