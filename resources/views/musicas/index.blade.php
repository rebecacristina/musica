@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Músicas</h2>
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
      <th>Author</th>
    </tr>
  </thead>

  
  <tbody>
    @foreach($musicas as $musica)

    <tr>
      <th scope="row">{{$musica->id}}</th>
      <td>
      <a href="{{ url("/musicas/{$musica->id}") }}">
        {{$musica->titulo}}
      </a>
      <td>{{ $musica->user->name }}</td>
      </td>

      <td>
      <form action="{{route('musicas.destroy', $musica->id)}}" method="POST">
        <a class="btn btn-info" href="{{route('musicas.show', $musica->id)}}">Visualizar
        </a>
        <a class="btn btn-info" href="{{route('musicas.edit', $musica->id)}}">Editar
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

{{$musicas->links()}}


@endsection