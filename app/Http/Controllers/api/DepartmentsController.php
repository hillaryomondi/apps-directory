<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $departments = Department::all();
        return response()->json($departments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(),[
            'text' => 'required'
        ]);
        if($validator->fails()){
            $response = array('response' => $validator->messages(), 'success'=>false);
            return $response;
        }else{
            //create department
            $department = new Department;
            $department->name = $request->input('name');
            $department->description = $request->input('description');
            $department->save();

            return response()->json($department);


        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $department = Item::find($id);
        return response()->json($department);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        //
        $validator = Validator::make($request->all(), [
            'text' => 'required'
        ]);
        if ($validator->fails()) {
            $response = array('response' => $validator->messages(), 'success' => false);
            return $response;
        } else {
            //find an item
            $department = Item::find($id);
            $department->name = $request->input('name');
            $department->description = $request->input('description');
            $department->save();

            return response()->json($department);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $department = Item::find($id);
        $department->delete();

        $response = array('response' => 'department deleted', 'success'=>true);
        return $response;
    }
}
