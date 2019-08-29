<?php

namespace App\Http\Controllers\API;

use App\Scenario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ScenarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Scenario::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this -> validate($request,[
            'nom' => 'required|unique:scenarios',
            'suivi_string' => 'required',
            'delais_string' => 'required',
        ]);


        return Scenario::create([
            'nom' => $request['nom'],
            'suivi' => $request['suivi_string'],
            'delais' => $request['delais_string']
        ]);
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
    }
}
