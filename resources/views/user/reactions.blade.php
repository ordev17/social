@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-md-6 col-md-offset-3">
@foreach($messages as $message)
<div class="well">
   <a class="btn btn-success"> <i class="glyphicon glyphicon-envelope"></i>   </a> {{$message}} 
</div>
@endforeach

</div>
@endsection