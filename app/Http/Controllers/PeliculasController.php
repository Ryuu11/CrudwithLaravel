<?php

namespace App\Http\Controllers;

use App\Peliculas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PeliculasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['peliculas']=Peliculas::paginate(5);
        return view('peliculas.index',$datos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('peliculas.create');
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
  

        $datosPeliculas=request()->except('_token');
        if($request->hasFile('Foto')){
            $datosPeliculas['Foto']=$request->file('Foto')->store('uploads','public');

            
        }
        Peliculas::insert($datosPeliculas);
        return redirect('peliculas')->with('Mensaje','Pelicula agregada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Peliculas  $peliculas
     * @return \Illuminate\Http\Response
     */
    public function show(Peliculas $peliculas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Peliculas  $peliculas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $pelicula=Peliculas::findOrFail($id);
        //compact crea un conjunto de informacion a traves de una variable
        return view('peliculas.edit', compact('pelicula'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Peliculas  $peliculas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosPeliculas=request()->except(['_token','_method']);
        if($request->hasFile('Foto')){

            $pelicula=Peliculas::findOrFail($id);
            Storage::delete('public/'.$pelicula->Foto);
            $datosPeliculas['Foto']=$request->file('Foto')->store('uploads','public');
        }

        Peliculas::where('id','=',$id)->update($datosPeliculas);
        
        return redirect('peliculas')->with('Mensaje','Pelicula actualizada con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Peliculas  $peliculas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $pelicula=Peliculas::findOrFail($id);
        if(Storage::delete('public/'.$pelicula->Foto)){
            Peliculas::destroy($id);
        }
        

        return redirect('peliculas')->with('Mensaje','Pelicula borrada exitosamente');
    }
}
