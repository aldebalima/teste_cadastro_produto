@extends('adminlte::page')

@section('title', 'Detalhes da Tag')



@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <a href="{{route('tags.index')}}" class="btn btn-primary"> Voltar</a>
    </div>
</div>

    <div class="card">
       <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{$tag->name}}
                        
                </li>
                <li>
                    <strong>Detalhes da Tag: </strong>
                        {{$tag->detail}}
                </li>
                
                <li style="list-style-type: none">
                    <img src="{{url("storage/{$tag->image}")}}" alt="{{$tag->name}}"> 
                </li>
            
              
            </ul>
            
           
       </div> 
    </div>
    @stop