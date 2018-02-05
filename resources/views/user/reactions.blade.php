@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-md-6 col-md-offset-3">
@foreach($messages as $message)
<div class="well">
   <a class="btn btn-success"> <i class="glyphicon glyphicon-envelope"></i>   </a> {{$message->toUser->username}} 
   <hr/>
   
 <?php $array=json_decode($message->reaction);?>
   
  <div class="row">
      <div class="col-md-3">
 <img src='/media/icon_angry.png' alt='angry' >
 <?php echo((round($array[0]->value,3 )*100)."%"  ); ?>
 </div>
       <div class="col-md-3">
 <img src='/media/icon_sad.png' alt='sad' >
 <?php echo((round($array[1]->value,3 )*100)."%"  ); ?>
 </div>
       <div class="col-md-3">
 <img src='/media/icon_surprised.png' alt='sad' >
 <?php echo((round($array[2]->value,3 )*100)."%"  ); ?>
 </div>
       <div class="col-md-3">
 <img src='/media/icon_happy.png' alt='sad' >
 <?php echo((round($array[3]->value,3 )*100)."%"  ); ?>
 </div>
 </div>
   
   <hr/>
    {{$message->content}}
</div>
@endforeach

</div>
@endsection