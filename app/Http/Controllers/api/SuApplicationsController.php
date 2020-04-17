<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SuApplication;

class SuApplicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $suapplications = SuApplication::all();
        return response()->json($suapplications);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
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
            //create suapplication
            $suapplication = new SuApplication;
            $suapplication->name = $request->input('name');
            $suapplication->description = $request->input('description');
            $suapplication->save();

            return response()->json($suapplication);


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
        $suapplication = Item::find($id);
        return response()->json($suapplication);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
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
            $suapplication = Item::find($id);
            $suapplication->name = $request->input('name');
            $suapplication->description = $request->input('description');
            $suapplication->save();

            return response()->json($suapplication);

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
        $suapplication = Item::find($id);
        $suapplication->delete();

        $response = array('response' => 'application deleted', 'success'=>true);
        return $response;
    }
}
