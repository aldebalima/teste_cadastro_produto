@extends('adminlte::page')

@section('title', "Tags do Produto")
@section('content_header')


    <ol class="breadcrumb">
        <li class="breadcrumb-item"> <a href="{{route('products.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item"> <a href="{{route('products.index')}}">Produtos</a></li>
        <li class="breadcrumb-item active"><a href="{{route('tags.product.index', $product->id)}}">Tags do Produto</a></li>
        
    </ol>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <a href="{{route('tags.product.avaiable', $product->id)}}" class="btn btn-primary"> Add Tag no Produto</a>
        </div>
    </div>
@stop

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
    <div class="card">
        <div class="card-header">
            <div class="col-lg-12 margin-tb">
                <form class="form form-inline" action="{{route('tags.product.search', $product->id)}}"method="POST">
                    @csrf
                    <input type="text" name="filter" placeholder="Nome" class="form-control" value="{{$filters['filter'] ?? ''}}">
                    <button class="btn btn-dark" type="submit">Filtrar</button>
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="align-content-center col-lg-12 margin-tb">
                <table class="table table-bordered">
                    <tr>
        
                        <th>Tag</th>
                        <th>Detalhes</th>
                        <th width="280px">Ações</th>
                    </tr>
                    @if (isset($tags))
                     @foreach ($tags as $tag)
                        <tr>
                            <td>{{$tag->name}}</td>
                            <td>{{$tag->detail}}</td>
                            <td>
                                <form action="{{route('tags.product.destroy', $product->id)}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="tag_id" value={{$tag->id}}>
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Remover</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach    
                    @endif
                    
                </table>    
            </div> 
        </div>
       
    </div>
@stop