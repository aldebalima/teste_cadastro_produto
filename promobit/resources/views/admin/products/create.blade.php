

@extends('adminlte::page')

@section('title', 'Produtos')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Adicione um novo Produto</h2>

        </div>
        <div class="pull-rigth">
            <a class="btn btn-primary" href="{{route('products.index')}}"> Inicio</a>

            
        </div>
    </div>
</div>
@if($errors->any())
    <div class="alert alert-danger">
        <strong> Opa!!!</strong>Existe algum problema com seu INPUT<br><br>
        <ul>
            @foreach ($errors->all() as $erro )
                <li> {{$erro}}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
@csrf
    <div class="row">
     <div class="col-xs-12 col-sm-12 col-md-12">
         <div class="form-group">
             <strong>Nome</strong>
                <input type="text" name="name" id="name" class="form-control" placeholder="Nome do Produto">
         </div>
     </div>

     <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Detalhes</strong>
               <input type="text" name="detail" id="detail" class="form-control" placeholder="detalhes do Produto">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Upload de imagem: </strong>
               <input type="file" name="image" class="form-control">
        </div>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12">
        <button type="submit" class="btn btn-primary">Criar</button>
    </div>    
    </div>
</form>    
@stop