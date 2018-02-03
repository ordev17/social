@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="panel panel-default">
            <div class=" panel-heading">
                Edit Post
            </div>
            <div class=" panel-body">
                <form method="POST" action="/posts/{{$post->id}}" >
                    {{csrf_field() }}
                <div class="form-group">
                    <label for="content" >Content</label>
                    <textarea name="content"  class="form-control">{{$post->content}}</textarea>
                </div>
                    <input type="hidden" name="_method" value="PUT">
                <input type="submit" class="btn btn-success pull-right" value="Save">
                </form>
            </div>
        </div>
    </div>
</div>


@endsection