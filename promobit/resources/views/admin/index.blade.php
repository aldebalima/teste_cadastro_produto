@extends('adminlte::page')

@section('title', 'Produtos | P')

@section('content_header')
<p>Demonstrativos</p>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"> <a href="{{route('admin.index')}}">Dashboard</a></li>
    </ol>
@stop

@section('content')

<div class="row">
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
        <div class="inner">
        <h3>{{count($result1)}}</h3>
        <p>Total de Produtos</p>
        </div>
        <div class="icon">
        <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer">Listar produtos <i class="fa fa-arrow-circle-right"></i></a>
        </div>
        </div>
        
        <div class="col-lg-3 col-xs-6">
        
        <div class="small-box bg-yellow">
        <div class="inner">
        <h3>{{count($result2)}}</h3>
        <p>Total de Tags</p>
        </div>
        <div class="icon">
        <i class="ion ion-person-add"></i>
        </div>
        <a href="#" class="small-box-footer">Listar tags <i class="fa fa-arrow-circle-right"></i></a>
        </div>
        </div>
        
        <div class="col-lg-3 col-xs-6">
        
        <div class="small-box bg-blue">
        <div class="inner">
        <h3>{{$result3}}</h3>
        <p>Produtos Classificados</p>
        </div>
        <div class="icon">
        <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer"> Listar Produtos<i class="fa fa-arrow-circle-right"></i></a>
        </div>
        </div>
        <div class="col-lg-3 col-xs-6">
        
            <div class="small-box bg-red">
            <div class="inner">
            <h3>{{count($result1) - $result3}}</h3>
            <p>Produtos Sem classificação</p>
            </div>
            <div class="icon">
            <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer"> Listar Produtos<i class="fa fa-arrow-circle-right"></i></a>
            </div>
            </div>
</div>  
<div class="col-md-12">
    <div class="card">
        <div class="card-header border-transparent">
            <h3 class="card-title">Relatório de Tags</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
               
            </div>
        </div>
    
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table m-0">
                <thead>
                    <tr>
                    <th width="100px">Tag ID</th>
                    <th width="100px">Nome</th>
                    <th width="40px">Logo</th>
                    <th width="50px">Uso</th>
                    <th>Lista de Produtos</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($result2))                       
                    
                        @foreach ($result2 as $item)
                            <tr>
                            <td>
                                <a href="{{route('tags.show', $item->id)}}">{{$item->id}}</a></td>
                            <td>{{$item->name}}</td>
                            <td>
                                <img src="{{url("storage/{$item->image}")}}" alt="{{$item->name}}"> 
                            <td>
                                <div class="sparkbar" data-color="#00a65a" data-height="20">{{$item->total_produtos}}x</div>
                            </td>
                            
                            <td>
                                <div class="sparkbar" data-color="#00a65a" data-height="20"><p class="lh-1">{{$item->todos_os_produtos}}</p></div>
                            </td>
                            </tr>    
                        
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
   
    
    </div>
    
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header border-transparent">
                <h3 class="card-title">Relatório relevância de Produdos</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
        
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table m-0">
                    <thead>
                        <tr>
                        <th width="100px">ID</th>
                        <th width="100px">Nome</th>
                        <th width="100px">Classificado</th>
                        <th>Lista de Tags</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($result1 as $item)
                            <tr>
                            <td>
                                <a href="{{route('products.show', $item->id)}}">{{$item->id}}</a></td>
                            <td>{{$item->name}}</td>
                            <td>
                                <div class="sparkbar" data-color="#00a65a" data-height="20">{{$item->total_tags}}x</div>
                            </td>
                            
                            <td>
                                <div class="sparkbar" data-color="#00a65a" data-height="20">{{$item->todos_as_tags}}</div>
                            </td>
                            </tr>    
                        
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
        
      
        
        </div>
        
        </div>    
   @stop    
