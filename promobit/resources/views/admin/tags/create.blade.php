

@extends('adminlte::page')

@section('title', 'Tags')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Adicione um nova tag</h2>

        </div>
        <div class="pull-rigth">
            <a class="btn btn-primary" href="{{route('tags.index')}}"> Inicio</a>

            
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
<form action="{{route('tags.store')}}" method="POST" enctype="multipart/form-data">
@csrf
    <div class="row">
     <div class="col-xs-12 col-sm-12 col-md-12">
         <div class="form-group">
             <strong>Nome</strong>
                <input type="text" name="name" id="name" class="form-control" placeholder="Apelido da Tag">
         </div>
     </div>

     <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Detalhes</strong>
               <input type="text" name="detail" id="detail" class="form-control" placeholder="detalhes da Tag">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Logo upload</strong>(limites 32px por 32px)
               <input type="file" name="image" id="image" class="form-control">
        </div>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12">
        <button type="submit" class="btn btn-dark">Criar</button>
    </div>    
    </div>
</form>    
@stop