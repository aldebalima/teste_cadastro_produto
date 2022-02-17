@extends('adminlte::page')

@section('title', 'Tags')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left"> Editando a Tag</div>
        <div class="pull-right"> 
            <a href="{{route('tags.index')}}" class="btn btn-primary"> Inicio</a>
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
<form action="{{route('tags.update', $tag->id)}}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nome</strong>
            <input type="text" name="name" id="name" class="form-control" value="{{$tag->name}}">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Detalhes da Tag:</strong>
            <input type="text" name="detail" id="detail" value="{{$tag->detail}}" class="form-control">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Logo upload</strong> (limites 500px por 500px)
            <input type="file" name="image" id="image" class="form-control">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <button type="submit" class="btn btn-dark">Alterar</button>
    </div>

</div>
</form>
@stop