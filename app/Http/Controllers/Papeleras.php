<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

use App\Papelera;

use DB;

class Papeleras extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $papelera = Papelera::all();
		return view("papelera/index")->with("papelera", $papelera);
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
    public function edit($id)
    {
		$papelera = Papelera::find($id);
		
		DB::table(strtolower($papelera->modulo))
            ->where('id', $papelera->id_rel)
            ->update(['estado' => DB::raw("'A'")]);
			
		Papelera::destroy($id);
		return Redirect::to("papelera");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {	
        $papelera = Papelera::find($id);
		
		DB::table(strtolower($papelera->modulo))
            ->where('id', $papelera->id_rel)
            ->delete();
			
        $papelera = Papelera::destroy($id);
		return Redirect::to("papelera");
    }
}
