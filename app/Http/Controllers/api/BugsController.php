<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bug;

class BugsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bugs = Bug::all();
        return response()->json($bugs);


    }



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
            //create bug
            $bug = new Bug;
            $bug->title = $request->input('title');
            $bug->description = $request->input('description');
            $bug->save();

            return response()->json($bug);


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
        $bug = Item::find($id);
        return response()->json($bug);
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
            //find a bug
            $bug = Item::find($id);
            $bug->name = $request->input('title');
            $bug->description = $request->input('description');
            $bug->save();

            return response()->json($bug);

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
        $bug = Item::find($id);
        $bug->delete();

        $response = array('response' => 'bug deleted', 'success'=>true);
        return $response;

    }
}
