@extends('layouts.app')

@section('content')
<div class="row">
    
    <div class="col-md-6 col-md-offset-3">
        <div class="well">
            <div class="panel-body text-center">


                <h1>{{$user->name}}</h1>
                <h3>{{$user->email}}</h3>
                <h3>{{$user->dbt->age}} years old </h3>
                <form method="post" action="/follow/{{$user->id}}" >
                    {{csrf_field()}}
                <input type="submit" class="btn btn-success" value="Follow" >
                </form>





            </div>
        </div>
    </div>

</div>
    <div class="row">
<div class="panel">
    @foreach ($user->posts as $post) 
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class=" panel-heading">
               <a href="/profile/{{$post->user->username}}" >{{$post->user->username}}</a>
               <small class="pull-right">{{$post->created_at->diffForHumans()}}</small>
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
        </div>
<div class="row">
{{$user->followers}}
</div>
@endsection
