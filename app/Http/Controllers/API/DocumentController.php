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
        return Document::latest()->where(function ($query){
            $query->where("archived","=",0);
        })->paginate(10);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getArchive(){
        return Document::latest()->where(function ($query){
            $query->where("archived","=",1);
        })->paginate(10);
    }
    /**
     * Display a listing of the resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function archiverDocument($id){
        $document=Document::find($id);
        $document->archived=1;
        $document->update();
    }
    /**
     * Display a listing of the resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function desarchiverDocument($id){
        $document=Document::find($id);
        $document->archived=0;
        $document->update();
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
            'num_ordre' => 'required|unique:documents',
            'date' => 'required',
            'chef_responsable' => 'required',
            'agence' => 'required',
            'ville' => 'required',
            'objet' => 'required',
            'type' => 'required',
            'scenario' => 'required',
        ]);


        return Document::create([
            'num_ordre' => $request['num_ordre'],
            'date' => $request['date'],
            'chef_responsable' => $request['chef_responsable'],
            'agence' => $request['agence'],
            'ville' => $request['ville'],
            'objet' => $request['objet'],
            'type' => $request['type'],
            'note' => $request['note'],
            'fournisseur' => $request['fournisseur'],
            'scenario' => $request['scenario']
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
