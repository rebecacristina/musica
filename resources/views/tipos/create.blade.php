@extends('layouts.app')
@section('content')

@if ($errors->any())
  <div class="alert alert-danger">
  <strong>Ops!</strong> Ouve um problema <br><br>
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
            <h2>Create a new Tipo</h2>
        </div>
    </div>
</div>

<form action="{{ route('tipos.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col">
                <div class="form-group">
                <strong>Título:</strong>
                <input type="text" name="name" class="form-control" >
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