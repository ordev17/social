
@extends('layouts.app')

@section('content')

<div class="row">
     @foreach ($posts as $post)
    <div class="col-md-6 col-md-offset-3">
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
<div class="row">
     
    <div class="col-md-6 col-md-offset-3">
        {{$posts->links()}}
    </div>
        
</div>


@endsection