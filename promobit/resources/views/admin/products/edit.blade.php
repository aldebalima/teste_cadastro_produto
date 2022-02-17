@extends('adminlte::page')

@section('title', 'Produtos')


@section('content')
<div class="card">
<div class="card-header">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left"> Editando Um Produto</div>
        <div class="pull-right"> 
            <a href="{{route('products.index')}}" class="btn btn-primary"> Voltar</a>
        </div>
    </div>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Opa!!!</strong> Ocorreu algum erro com o seu INPUT
        <ul>
            @foreach ($errors as $erro)
                <li>{{$erro}}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="card-body">
    <form action="{{route('products.update', $product->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nome</strong>
                <input type="text" name="name" id="name" class="form-control" value="{{$product->name}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Detalhes do Produto:</strong>
                <input type="text" name="detail" id="detail" class="form-control" value="{{$product->detail}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Url de imagem do Produto:</strong>(limites 500px por 500px)
                <input type="file" name="image" id="detail" class="form-control" value="{{$product->image}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <button type="submit" class="btn btn-dark">Alterar</button>
        </div>

    </div>
    </form>
</div>
</div>
@stop