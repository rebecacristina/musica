@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Show musica</h2>
        </div>
    </div>
</div>

@isset($musica->image)
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <img src="{{ asset('storage/'.$musica->image->path) }}" alt="">
        </div>
    </div>
</div>
@endisset


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Id</strong>
            {{$musica->id}}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Title:</strong>
            {{$musica->titulo}}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Letra:</strong>
            {{$musica->letra}}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Tipos musicais:</strong>
           @foreach ($musica->tipos as $tipo) 
            
            {{$tipo->name}}

          @endforeach  
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Updated:</strong>
            {{$musica->updated_at}}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Created:</strong>
            {{$musica->created_at}}
        </div>
    </div>
</div>




@endsection