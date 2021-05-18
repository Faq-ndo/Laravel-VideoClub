<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Movie;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CatalogController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    public function getIndex(){
        $movies = Movie::all();
        return view('catalog.catalog', ['arrayPeliculas' => $movies->toArray()]);
    }

    public function getShow($id){
        $movie = Movie::find($id);
        if (!is_null($movie)){
            return view('catalog.show', ['pelicula' => $movie->toArray()]);
        }else{
            return response('La película no existe', 404);
        }
    }

    public function getCreate(){
        return view('catalog.create');
    }

    public function store(Request $request){
        try {
            $this->validate($request, [
                'title' => 'required|string',
                'year' => 'required|numeric|min:4',
                'director' => 'required|string',
                'poster' => 'required',
                'synopsis' => 'required|min:10'
            ]);
        } catch (ValidationException $e) {
        }
        return view('catalog.catalog', ['arrayPeliculas' => $this->arrayPeliculas]);
    }

    public function getEdit($id) {
        $movie = Movie::find($id);
        if (!is_null($movie)){
            return view('catalog.edit', ['pelicula' => $movie->toArray()]);
        }else{
            return response('La película no existe', 404);
        }
    }

    public function postCreate(Request $request){
        $movie = new Movie;
        $movie->title = $request['title'];
        $movie->year = $request['year'];
        $movie->director = $request['director'];
        $movie->poster = $request['poster'];
        $movie->synopsis = $request['synopsis'];
        $movie->rented = false;
        $movie->save();
        return redirect('/catalog');
    }

    public function putEdit(Request $request){
        $movie = Movie::find($request['id']);
        $movie->title = $request['title'];
        $movie->year = $request['year'];
        $movie->director = $request['director'];
        $movie->poster = $request['poster'];
        $movie->synopsis = $request['synopsis'];
        $movie->rented = false;
        $movie->save();
        return redirect('/catalog/show/'.$request['id']);
    }

}
