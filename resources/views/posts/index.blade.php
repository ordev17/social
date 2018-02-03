
@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-2">
         
     </div>
    <div class="col-md-6 ">
     @foreach ($posts as $post)
     
    <div class="col-md-12 ">
        <div class="panel panel-default">
            <div class=" panel-heading">
               <a href="/profile/{{$post->user->username}}" >{{$post->user->username}}</a>
               <small class="pull-right">{{$post->updated_at->diffForHumans()}}</small>
            </div>
            
            <div class=" panel-body">
                
                  <a href="/posts/{{$post->id}}" > {{$post->content}}  </a>
               
                
            </div>
            <div class="panel-footer clearfix">
                <i class="glyphicon glyphicon-heart pull-right"></i>
            </div>
        </div>
    </div>
    
     
     @endforeach
     
    </div>
    
    <div class="col-md-4 ">
        <div class="row">
            <div class="12">
                <img class="img-responsive" src="{{ asset('img/cars/2.jpg') }}">
                </div>
            </div>
        <div class="row">
            <div class="12">
               <img class="img-responsive" src="{{ asset('img/mobile/1.jpg') }}">
                </div>
            </div>
        <div class="row">
            <div class="12">
               <img class="img-responsive" src="{{ asset('img/TV/3.jpg') }}">
                </div>
            </div>
        <div class="row">
            <div class="12">
               <img class="img-responsive" src="{{ asset('img/cars/4.jpg') }}">
                </div>
            </div>
        
        
        
        
        
        
    </div>
    
</div>

<div class="row">
     
    <div class="col-md-6 col-md-offset-3">
        {{$posts->links()}}
    </div>
        
</div>


@endsection