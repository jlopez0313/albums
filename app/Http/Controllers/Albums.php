<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

use App\Album;
use App\Papelera;

class Albums extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::where("estado", "A")->get();
		return view("albums/index")->with("albums", $albums);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("albums/crear");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$album = new Album;
		$album->titulo = $request->input("titulo");
		$album->estado = 'A';
		$album->save();
		
		return(Redirect::to("albums"));
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$album = Album::find($id);
        return view("albums/editar")->with("album", $album);
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
        $album = Album::find($id);
		$album->titulo = $request->input("titulo");
		$album->save();
		return(Redirect::to("albums"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $album = Album::find($id);
		$album->estado = 'I';
		$album->save();
		
		$papelera = new Papelera;
		$papelera->id_rel = $id;
		$papelera->modulo = "Albums";
		$papelera->item = $album->titulo;
		$papelera->save();
		
		return(Redirect::to("albums"));
    }
	
	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function lista()
    {
        $albums = Album::where("estado", "A")->get();
		return view("albums/lista")->with("albums", $albums);
    }
}
