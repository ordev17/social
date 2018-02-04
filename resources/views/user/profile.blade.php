@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-3 "></div>
    <div class="col-md-6 ">
        <div class="well">
            <div class="panel-body text-center">


                <h1>{{$user->name}}</h1>
                <h3>{{$user->email}}</h3>
                <h3>{{$user->dbt->age}} years old </h3>
                @if(Auth::user()->id != $user->id)
                <form method="post" action="/follow/{{$user->id}}" >
                    {{csrf_field()}}
                    <input type="submit" class="btn btn-success pull-left" value="Follow" >

                </form>
                <a  class="btn btn-primary  pull-right" id="mess-1"  >Message</a>

                @endif



            </div>
        </div>
    </div>
    <div class="col-md-3  message_content">
        <form method="POST" action="message" >
            {{csrf_field()}}
            <div class="form-group">
                <label> Write your message:</label>
            </div>
            <div class="form-group">
                <textarea name="mess">
            
                </textarea>
            </div>
            <input type="hidden" name="id" value="{{$user->id}}">
            <div class="form-group">
                <input type="submit" value="send" class="btn btn-primary">
            </div>
        </form>
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

@endsection
