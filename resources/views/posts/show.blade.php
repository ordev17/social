@extends('layouts.app')

@section('content')
<div class="col-md-6 col-md-offset-3">
    <div class="panel panel-default">
        <div class=" panel-heading">
            {{$post->user_id}}
            <small class="pull-right">{{$post->created_at->diffForHumans()}}</small>
        </div>

        <div class=" panel-body">

            <a href="/posts/{{$post->id}}" > {{$post->content}}  </a>


        </div>
        
        
        <div class="panel-footer clearfix">
            
            <i class="glyphicon glyphicon-heart pull-right"></i>
            
            @if(Auth::user()->id== $post->user_id)
             <a href="/posts/{{$post->id}}/edit"><i class="glyphicon glyphicon-pencil pull-left"></i></a>
             <form method="POST" action="/posts/{{$post->id}}" class="text-center">
                 {{csrf_field() }}
                 {{method_field('DELETE') }}
                 <input type="submit" value="Delete" class="btn btn-danger btn-sm" />
              </form>
             @endif
             
        </div>
    </div>
</div>

@endsection