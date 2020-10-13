@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Show Product</h2>
        </div>
    </div>
</div>




<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Id</strong>
            {{$tipo->id}}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Título:</strong>
            {{$tipo->name}}
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Updated:</strong>
            {{$tipo->updated_at}}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Created:</strong>
            {{$tipo->created_at}}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-8">
        <div class="form-group">
            <strong>Produtos com este tipo</strong>
            <ul class="list-group">
                @foreach($tipo->products as $product)
                    <div class="col">
                        <li class="list-group-item">
                            <a href="{{ url("/products/{$product->id}") }}">
                                {{ $product->title }}
                            </a>
                        </li>
                    </div>
                @endforeach
            </ul>
        </div>
    </div>

</div>




@endsection