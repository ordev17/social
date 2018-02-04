@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-md-6 col-md-offset-3">
@foreach($messages as $message)
<div class="well">
   <h3> <a> <i class="glyphicon glyphicon-envelope"></i> </a> </h3>
</div>
@endforeach

</div>
@endsection