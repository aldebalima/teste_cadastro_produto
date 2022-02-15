@extends('adminlte::page')

@section('title', 'Tags | P')
@section('content_header')
<p>Bem vindo ao painel administrativo!!</p>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"> <a href="{{route('products.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('tags.index')}}">Tags</a></li>
    </ol>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <a href="{{route('tags.create')}}" class="btn btn-primary"> Criar Nova Tag</a>
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
                <form class="form form-inline" action="{{route('tags.search')}}"method="POST">
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
                        <th>Nº</th>
                        <th>Nome</th>
                        <th>Detalhes</th>
                        <th>Imagem</th>
                        <th width="280px">Ações</th>
                    </tr>
                    @foreach ($tags as $tag)
                        <tr>
                            <td>{{$tag->id}}</td>
                            <td>{{$tag->name}}</td>
                            <td>{{$tag->detail}}</td>
                            <td>{{$tag->tag_image_url}}</td>
                            <td>
                                <form action="{{route('tags.destroy', $tag->id)}}" method="POST">
                                    <a href="{{route('tags.show', $tag->id)}}" class="btn btn-info">Detalhes</a>
                                    <a href="{{route('tags.edit',$tag->id)}}" class="btn btn-primary">Editar tag</a>
                                    @csrf
                                    @method('DELETE')
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
                {{ $tags->appends($filters)->links() }}
            @else
                {{ $tags->links() }}
            @endif
            
        </div>
    </div>
@stop