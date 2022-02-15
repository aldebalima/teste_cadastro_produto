@extends('adminlte::page')

@section('title', 'Produtos | P')

@section('content_header')
<p>Bem vindo ao painel administrativo!!</p>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"> <a href="{{route('products.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('products.index')}}">Produtos</a></li>
    </ol>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <a href="{{route('products.create')}}" class="btn btn-primary"> Criar Novo Produto</a>
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
                <form class="form form-inline" action="{{route('products.search')}}">
                    @csrf
                    <input type="text" name="filter" placeholder="Nome" class="form-control">
                    <button class="btn btn-dark" type="submit">Filtrar</button>
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="align-content-center col-lg-12 margin-tb">
                    <table class="table table-condensed">
                        <tr>
                            
                            <th>Nome</th>
                            <th>Detalhes</th>
                            <th>Imagem</th>
                            <th width="280px">Ações</th>
                        </tr>
                        @foreach ($products as $product)
                            <tr>
                                
                                <td>{{$product->name}}</td>
                                <td>{{$product->detail}}</td>
                                <td>
                                    
                                    <img style="max-width:45px" src="{{ url("storage/{$product->image}") }}" alt="{{$product->name}}"></td>
                                <td>
                                    <form action="{{route('products.destroy', $product->id)}}" method="POST">
                                        @csrf
                                        
                                        @method('DELETE')
                                        
                                        <a href="{{ route('products.show', $product->id)}}" class="btn btn-info">Detalhes</a>
                                        <a href="{{ route('tags.product.index', $product->id)}}" class="btn btn-info">Tags</a>
                                        <a href="{{ route('products.edit', $product->id)}}" class="btn btn-primary">Editar</a>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>    
            </div> 
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {{ $products->appends($filters)->links() }}
            @else
                {{ $products->links() }}
            @endif
            
        </div>
     </div>
@stop