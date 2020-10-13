@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Tipo</h2>
        </div>
    </div>
</div>

@if (session('success'))
  <div class="alert alert-success">
    {{ session('success')}}
  </div>
@endif

@if (session('error'))
  <div class="alert alert-danger">
    {{ session('error')}}
  </div>
@endif



<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Título</th>
     
    </tr>
  </thead>

  
  <tbody>
    @foreach($tipos as $tipo)

    <tr>
      <th scope="row">{{$tipo->id}}</th>
      <td>
      <a href="{{ url("/tipos/{$tipo->id}") }}">
        {{$tipo->name}}
      </a>
      
      </td>

      <td>
      <form action="{{route('tipos.destroy', $tipo->id)}}" method="POST">
        <a class="btn btn-info" href="{{route('tipos.show', $tipo->id)}}">Visualizar
        </a>
        <a class="btn btn-info" href="{{route('tipos.edit', $tipo->id)}}">Editar
        </a>
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>

      </form>
      </td>
    
    
    </tr>
    @endforeach
    
  </tbody>
</table>




@endsection