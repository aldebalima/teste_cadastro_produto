

@extends('adminlte::page')

@section('title', 'Seleção de tags')


@section('content')

@if (isset($message)==true)
@if ($message == Session::get('sucesss'))
    <div class="alert alert-sucess">
        <p>
        {{$message ?? ''}}
        </p>
    </div>
@endif

@endif
<ol class="breadcrumb">
    <li class="breadcrumb-item"> <a href="{{route('products.index')}}">Dashboard</a></li>
    <li class="breadcrumb-item"> <a href="{{route('products.index')}}">Produtos</a></li>
    <li class="breadcrumb-item active"><a href="{{route('tags.product.index', $product->id)}}">Tags do Produto</a></li>
    <li class="breadcrumb-item active"><a href="{{route('tags.product.index', $product->id)}}">Adicionar Tags </a></li>
    
</ol>
<div class="card">
<div class="card-header">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right"> 
            <a href="{{route('products.index')}}" class="btn btn-primary"> Voltar</a>
        </div><br>
        <div class="pull-left"><form class="form form-inline" action="{{route('tags.product.avaiable.list.search', $product->id)}}">
            @csrf
            <input type="text" name="filter" placeholder="Nome" class="form-control">
            <button class="btn btn-dark" type="submit">Filtrar</button>
        </form></div>
       
    </div>
   
</div>
<div class="card-body">
    <div class="align-content-center col-lg-12 margin-tb">
            <table class="table table-condensed">
                <tr>
                    
                    
                    <th width="50px">#</th>
                    <th>Nome</th>
                    
                </tr>
                <form action="{{route('tags.product.avaiable.list.store', $product->id)}}" method="POST">
                    @csrf
                    @foreach ($tags as $tag)
                        <tr>
                        
                            <td><input type="checkbox" name="tags[]" value = "{{$tag->id}}" @if (isset($tagsChecked) && in_array("$tag->id", $tagsChecked))
                                
                            @endif></td>
                            <td>{{$tag->name}}</td>
                            
                        </tr>
                    @endforeach
                    <tr>
                       <td> <button class="btn btn-dark" type="submit">Vincular</button></td>
                    </tr>
                </form>
            </table>    
    </div> 
</div>

</div>
@stop