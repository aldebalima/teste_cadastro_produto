@extends('adminlte::page')

@section('title', 'Detalhes do Produtos')



@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <a href="{{route('products.index')}}" class="btn btn-primary"> Voltar</a>
    </div>
</div>
    <div class="card">
        <div class="card-header">
            <div class="col-lg-12 margin-tb">
               Detalhamento:
            </div>
        </div>
       <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{$product->name}}
                        
                </li>
                <li>
                    <strong>Detalhes da Tag: </strong>
                        {{$product->detail}}
                </li>
                
                 <li style="list-style-type: none">
                    <img src="{{url("storage/{$product->image}")}}" alt="{{$product->name}}"> 
                </li>
            
              
            </ul>
            
           
       </div> 
    </div>
    @stop