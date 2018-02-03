
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
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>
<script>
    

    
    
 
    $('#myModal').modal('toggle');
        
    


    
    

    
    
</script>


@endsection