
@extends('adminlte::page')

@section('title', 'Tags | P')


@section('content')


<div class="container" style="padding-top:30px">
      <div class="row">
    
        @foreach ($agrupador as $product )
            <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <img src='{{url("storage/{$product->image}")}}' class="bd-placeholder-img card-img-top" width="100%" height="225" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" >
                <div class="card-body">
                <p class="card-text">Produto: <a href="{{route('products.show', $product->id)}}"><strong>{{$product->name}}</strong></a></p>
                <p>{{$product->detail}}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        @foreach ($product->url_tags_image as $tag)
                            <img src='{{url("storage/{$tag->image}")}}' class="bd-placeholder-img"  data-toggle="tooltip" data-placement="bottom" title='{{$tag->name}}'>                           
                        @endforeach
                    
                    </div>
                    <small class="text-muted">9 mins</small>
                </div>
                </div>
            </div>
            </div>
       
       @endforeach
          
     
    </div>
    





    
        
    
    <hr>
    <footer>
        <div class="row">
            <div class="col-md-6">
                <p>Copyright &copy; 2022 Myself</p>
            </div>
            <div class="col-md-6 text-md-end">
                <a href="#" class="text-dark">Terms of Use</a> 
                <span class="text-muted mx-2">|</span> 
                <a href="#" class="text-dark">Privacy Policy</a>
            </div>
        </div>
    </footer>
</div>
@stop