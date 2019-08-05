<?php

namespace App\Http\Controllers\API;

use App\Document;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'num_ordre' => 'required|numeric|unique:documents',
            'date' => 'required',
            'chef_responsable' => 'required',
            'agence' => 'required',
            'ville' => 'required',
            'objet' => 'required',
            'type' => 'required',
        ]);


        return Document::create([
            'num_ordre' => $request['num_ordre'],
            'date' => $request['date'],
            'chef_responsable' => $request['chef_responsable'],
            'agence' => $request['agence'],
            'ville' => $request['ville'],
            'objet' => $request['objet'],
            'type' => $request['type'],
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
