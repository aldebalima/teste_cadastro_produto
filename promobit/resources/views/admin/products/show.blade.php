@extends('adminlte::page')

@section('title', 'Detalhes do Produtos')



@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <a href="{{route('products.index')}}" class="btn btn-primary"> Voltar</a>
    </div>
</div>
<div class="row position-center">
    <div class="col-md-3"></div>
    <div class="col-md-6">
    <div class="card ">
        <div class="card-header">
            <div class="col-lg-12 margin-tb">
               Exibição
            </div>
        </div>
       <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{$product->name}}
                        
                </li>
                <li>
                    <strong>Detalhes do Produto: </strong>
                        {{$product->detail}}
                </li>
                <li style="list-style-type: none">
                    <div class="row">
                    @foreach ($tags as $tag)
                        <img src="{{url("storage/{$tag->image}")}}" alt="{{$tag->name}}" data-toggle="tooltip" data-placement="bottom" title="{{$tag->name}}">     
                    @endforeach
                </div>
                    
                </li>
                 <li style="list-style-type: none">
                    <img src="{{url("storage/{$product->image}")}}" alt="{{$product->name}}"> 
                </li>
                
            
              
            </ul>
            
           
       </div> 
    </div>
    </div>
    <div class="col-md-3"></div>
</div>

    
    @stop