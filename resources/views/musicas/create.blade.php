@extends('layouts.app')
@section('content')


@if ($errors->any())
    <div class="alert alert-danger">
    <strong>Eita!</strong> Problema encontrado <br><br>
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
    @endforeach 
    </ul> 
    </div>
    @endif


<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create a new Music</h2>
        </div>
    </div>
</div>

<form action="{{ route('musicas.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col">
                <div class="form-group">
                <strong>Título:</strong>
                <input type="text" name="titulo" class="form-control">
                </div>
         </div>
     </div>

     <div class="row">
        <div class="col">
                <div class="form-group">
                <strong>Letra:</strong>
                <textarea  name="letra" class="form-control"> </textarea>
                </div>
         </div>
     </div>

     <div class="row">
        <div class="col">
                <div class="form-group">
                <strong>Ano:</strong>
                <input type="number" name="ano" class="form-control"> </input>
                </div>
         </div>
     </div>

     <div class="row">
        <div class="col">
                <div class="form-group">
                <strong>Album:</strong>
                <input type="number" name="album" class="form-control"> </input>
                </div>
         </div>
     </div>

     <div class="row">
        <div class="col">
                <div class="form-group">
                <strong>Premios:</strong>
                <input type="number" name="premios" class="form-control"> </input>
                </div>
         </div>
     </div>

     <div class="row">
        <div class="col">
                <div class="form-group">
                <strong>Imagem do album:</strong>
                <input type="file" id="image" name="image" class="form-control" >
                </div>
         </div>
     </div>
     <div class="row">
        <div class="col">
                <div class="form-group">
                <strong>Tipos musicais:</strong>
                    <select class="custom-select" name="tipos_id[]" multiple>
                        @foreach ($tipos as $tipo)
                            <option value="{{ $tipo->id }}">{{ $tipo->name }}</option>
                        @endforeach    
                    </select>
                </div>
         </div>
     </div>

     <div class="row">
        <div class="col text-center">
                
                <button type="submit" class="btn col btn-primary">CREATE</button>
                
         </div>
     </div>

     

</form>


@endsection