@extends('layouts.app')
@section('content')


<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edite sua música</h2>
        </div>
    </div>
</div>

<form action="{{ route('musicas.update', $musica->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col">
                <div class="form-group">
                <strong>Título:</strong>
                <input type="text" name="titulo" class="form-control" value="{{$musica->titulo}}">
                </div>
         </div>
     </div>

     <div class="row">
        <div class="col">
                <div class="form-group">
                <strong>Letra:</strong>
                <textarea  name="letra" class="form-control">{{$musica->letra}}</textarea>
                </div>
         </div>
     </div>

     <div class="row">
        <div class="col">
                <div class="form-group">
                <strong>Ano:</strong>
                <input type="number" name="ano" class="form-control" value="{{$musica->ano}}">
                </div>
         </div>
     </div>

     <div class="row">
        <div class="col">
                <div class="form-group">
                <strong>Album:</strong>
                <input type="number" name="album" class="form-control" value="{{$musica->album}}">
                </div>
         </div>
     </div>

     <div class="row">
        <div class="col">
                <div class="form-group">
                <strong>Premios:</strong>
                <input type="number" name="premios" class="form-control" value="{{$musica->premios}}">
                </div>
         </div>
     </div>
     <div class="row">
        <div class="col">
                <div class="form-group">
                <strong class ="col-2">Imagem:</strong>
                <img class="col-2" src="{{ asset('storage/'.$musica->image->path) }}" alt="">
                <input class ="col-8" type="file" id="image" name="image" class="form-control">
                </div>
         </div>
     </div>

     <div class="row">
        <div class="col">
                <div class="form-group">
                <strong>Tipos musicais:</strong>
                    <select class="custom-select" name="tipos_id[]" multiple>
                        @foreach ($tipos as $tipo)
                            @if($musica->tipos->contains($tipo))
                            <option value="{{ $tipo->id }}" selected>{{ $tipo->name }}</option>
                            @else
                            <option value="{{ $tipo->id }}">{{ $tipo->name }}</option>
                            @endif
                        @endforeach    
                    </select>
                </div>
         </div>
     </div>

     <div class="row">
        <div class="col text-center">
                
                <button type="submit" class="btn col btn-primary">UPDATE</button>
                
         </div>
     </div>

     

</form>


@endsection