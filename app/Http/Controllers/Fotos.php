<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

use App\Album;
use App\Foto;
use App\Papelera;
use App\Tag;

use Storage;
use DB;

class Fotos extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($album)
    {
		$fotos = DB::table("fotos")
				->join("albums", "fotos.id_album", "=", "albums.id")
				->select("fotos.*", "albums.titulo")
				->where("id_album", $album)
				->where("fotos.estado", "A")
				->get();
        return view("fotos/index")->with(["fotos" => $fotos, "album" => $album]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($album)
    {
        return view("fotos/crear")->with("album", $album);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $archivo= $request->file('archivo');
		$nombre = $archivo->getClientOriginalName();
		$ext 	= $archivo->getClientOriginalExtension();       
		
		$load	= Storage::disk('archivos')->put($nombre,  \File::get($archivo) );
		if($load){
			$fotos = new Foto;
			$fotos->id_album 	= $request->input("idAlbum");
			$fotos->foto 		= $nombre;
			$fotos->descripcion = $request->input("desc");
			$fotos->estado 		= 'A';
			$fotos->save();
			
			foreach( explode(", ", $request->input("tags")) as $tag){
				$tags = new Tag;
				$tags->id_foto 	= $fotos->id;
				$tags->tag 		= $tag;
				$tags->save();
			}
			
			return(Redirect::to("fotos/album/".$request->input("idAlbum")));
		}
		
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($album, $id)
    {
        $foto = Foto::find($id);
		$tags = Tag::where("id_foto", $id)->get();
		foreach($tags as $tag){
			$arrayTags[] = $tag->tag;
		}
        return view("fotos/ver")->with(["album" => $album, "foto" => $foto, "tags" => $arrayTags]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($album, $id)
    {
		$foto = Foto::find($id);
		
		$arrayTags = array();
		$tags = Tag::where("id_foto", $id)->get();
		foreach($tags as $tag){
			$arrayTags[] = $tag->tag;
		}
        return view("fotos/editar")->with(["album" => $album, "foto" => $foto, "tags" => $arrayTags]);
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
        $foto = Foto::find($id);
        $foto->descripcion = $request->input("desc");
		$foto->save();
		
		$tags = Tag::where("id_foto", $id)->delete();
		
		foreach( explode(", ", $request->input("tags")) as $tag){
			$tags = new Tag;
			$tags->id_foto 	= $id;
			$tags->tag 		= $tag;
			$tags->save();
		}
		
		
		return(Redirect::to("fotos/album/".$foto->id_album));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $foto = Foto::find($id);
		$foto->estado = 'I';
		$foto->save();
		
		$papelera = new Papelera;
		$papelera->id_rel = $id;
		$papelera->modulo = "Fotos";
		$papelera->item = $foto->foto;
		$papelera->save();
		
		return(Redirect::to("fotos/album/".$foto->id_album));
    }
	
	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function lista($album)
    {
		$fotos = Foto::where("id_album", $album)
				->where("fotos.estado", "A")
				->get();
		$arrayTags = array();
		foreach($fotos as $foto){
			$tags = Tag::where("id_foto", $foto->id)->get();
			foreach($tags as $tag){
				$arrayTags[$tag->id_foto] = (isset($arrayTags[$tag->id_foto]) ? $arrayTags[$tag->id_foto] : '' ).', '.$tag->tag;
			}
		}
		$info = Album::find($album);
		
        return view("fotos/lista")->with(["album" => $info, "fotos" => $fotos, "tags" => $arrayTags]);
    }
	
	
	/**
     * Display a listing of the resource by tag name.
     *
     * @return \Illuminate\Http\Response
     */
    public function find(Request $request, $id)
    {
		$lisTags = explode(", ", $request->input("search"));
		
		$fotos = DB::table("tags")
				->join("fotos", "fotos.id", "=", "tags.id_foto")
				->where("fotos.id_album", $id)
				->whereIn("tags.tag", $lisTags)
				->get();
		
		$arrayTags = array();
		foreach($fotos as $foto){
			$tags = Tag::where("id_foto", $foto->id)->get();
			foreach($tags as $tag){
				$arrayTags[$tag->id_foto] = (isset($arrayTags[$tag->id_foto]) ? $arrayTags[$tag->id_foto] : '' ).', '.$tag->tag;
			}
		}
		$info = Album::find($id);
		
		return view("fotos/busqueda")->with(["fotos" => $fotos, "album" => $info, "tags" => $arrayTags]);
    }
	
	
	/**
     * Display a listing of the resource by tag name and album.
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
		return view("fotos/search");
    }
	
	
	/**
     * Display a listing of the resource by tag name.
     *
     * @return \Illuminate\Http\Response
     */
    public function busqueda(Request $request)
    {
		$lisTags = explode(", ", $request->input("search"));
		
		$fotos = DB::table("tags")
				->join("fotos", "fotos.id", "=", "tags.id_foto")
				->join("albums", "fotos.id_album", "=", "albums.id")
				->select("albums.titulo", "fotos.*")
				->whereIn("tags.tag", $lisTags)
				->get();
		
		$arrayTags = array();
		foreach($fotos as $foto){
			$tags = Tag::where("id_foto", $foto->id)->get();
			foreach($tags as $tag){
				$arrayTags[$tag->id_foto] = (isset($arrayTags[$tag->id_foto]) ? $arrayTags[$tag->id_foto] : '' ).', '.$tag->tag;
			}
		}
		
		return view("fotos/global")->with(["fotos" => $fotos, "tags" => $arrayTags]);
    }
}
