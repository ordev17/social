@extends('layouts.app')

@section('content')

<div class="col-md-6 col-md-offset-3">
    
        @foreach ($users as $user)
        <div class="well">
    <a href="/profile/{{$user->username}}">{{$user->username}}</a>
     </div>
    @endforeach
   
</div>

@endsection