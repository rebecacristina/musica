<?php

namespace App\Http\Controllers;

use App\Models\Musica;
use App\Models\Image;
use App\Models\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $tipos = Tipo::all();
        return view('musicas.create', compact('tipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //musica::create($request->all());

        $validateData = $request->validate([
                'titulo' => ['required', 'unique:musicas'],
                'letra' =>['required'],
                'ano' =>['required'],
                'album' =>['required'],
                'premios' =>['required'],
                'image'=> ['mimes:jpeg,png', 'dimensions:min_width=200,min_height=200'],
                'tipos_id'=>['array']
            ]);

        $musica = new Musica($validateData);

        $musica->user_id = Auth::id();

        $musica->save();
        $musica->tipos()->attach($validateData['tipos_id']);

        if($request->hasFile('image') and $request->file('image')->isValid()){
            $extension = $request->image->extension();
            $image_name = now()->toDateTimeString()."_".substr(base64_encode(sha1(mt_rand())
            ), 0, 10);
            $path = $request->image->storeAs('musicas', $image_name.".".$extension, 'public');

            $image = new Image();
            $image->musica_id = $musica->id;
            $image->path = $path;
            $image->save();
        }
        
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
            $tipos = Tipo::all();
            return view('musicas.edit', compact('musica', 'tipos'));
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

            if($request->hasFile('image') and $request->file('image')->isValid()){
                $musica->image->delete();
                
                $extension = $request->image->extension();
                $image_name = now()->toDateTimeString()."_".substr(base64_encode(sha1(mt_rand())
               ), 0, 10);
               $path = $request->image->storeAs('musicas', $image_name.".".$extension, 'public');
               
               $image = new Image();
               $image->path = $path;
               $image->musica_id = $musica->id;
               $image->save();
               
           }


            return redirect()->route('musicas.index')->with('success', 'Música editada com sucesso');;
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
    
            return redirect()->route('musicas.index')->with('success', 'Música deletada com sucesso');;
            }else{
                return redirect()->back()
                ->with('error', 'Não pode deletar')
                ->withInput();
            }
    
    }
}
