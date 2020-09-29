<?php

namespace App\Http\Controllers;

use App\Models\Musica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MusicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $musicas = Musica::where('user_id', Auth::id())
        ->orderBy('created_at', 'desc')
        ->paginate(3);
        return view('musicas.index', compact('musicas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('musicas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $musica = new Musica($request->all());

        $musica->user_id = Auth::id();

        $musica->save();
        
        return redirect()->route('musicas.index')->with('success', 'Música criada com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Musica  $musica
     * @return \Illuminate\Http\Response
     */
    public function show(Musica $musica)
    {
        return view('musicas.show', compact('musica'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Musica  $musica
     * @return \Illuminate\Http\Response
     */
    public function edit(Musica $musica)
    {
        if($musica->user_id === Auth::id()){
            return view('musicas.edit', compact('musica'));
            }else{
                return redirect()->route('musicas.index')
                ->with('error', 'Não foi possível editar')
                ->withInput();
            }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Musica  $musica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Musica $musica)
    {
        if($musica->user_id === Auth::id()){
            $musica->update($request->all());
            return redirect()->route('musicas.index')->with('success', 'Produto editado com sucesso');;
            }else{
                return redirect()->route('musicas.index')
                ->with('error', 'Não pode editar')
                ->withInput();
            }   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Musica  $musica
     * @return \Illuminate\Http\Response
     */
    public function destroy(Musica $musica)
    {
        if($musica->user_id === Auth::id()){

            
            $musica->delete();
    
            return redirect()->route('musicas.index')->with('success', 'Produto deletado com sucesso');;
            }else{
                return redirect()->back()
                ->with('error', 'Não pode deletar')
                ->withInput();
            }
    
    }
}
