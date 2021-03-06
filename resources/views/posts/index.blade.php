@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-2">

        </div>
        <div class="col-md-6">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="col-md-12">
                @foreach ($posts as $post)
                    <div class="panel panel-default">
                        <div class=" panel-heading">
                            <a href="/profile/{{$post->user->username}}">{{$post->user->username}}</a>
                            <small class="pull-right">{{$post->updated_at->diffForHumans()}}</small>
                        </div>

                        <div class=" panel-body">

                            <a href="/posts/{{$post->id}}"> {{$post->content}}  </a>


                        </div>
                        <div class="panel-footer clearfix">
                            <i class="glyphicon glyphicon-heart pull-right"></i>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

        <div class="col-md-3">
            <div class="row">
                <div class="col-md-12">
                    <img class="img-responsive" id="ad" src="img/undefined.jpg">
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
                    <h4 class="modal-title">Advertisement</h4>
                </div>
                <div class="modal-body">
                    <img class="img-responsive" id="advertImg" src="img/undefined.jpg">
                    <div id="content" style="display: none">
                        <hr>
                        <h2>Emotion detection video</h2>
                        <div id="container">
                            <video id="videoel" width="400" height="300" preload="auto" loop playsinline autoplay>
                            </video>
                            <canvas id="overlay" width="400" height="300"></canvas>
                        </div>
                        <div id="emotion_container">
                            <div id="emotion_icons">
                                <img class="emotion_icon" id="icon1" src="./media/icon_angry.png">
                                <img class="emotion_icon" id="icon2" src="./media/icon_sad.png">
                                <img class="emotion_icon" id="icon3" src="./media/icon_surprised.png">
                                <img class="emotion_icon" id="icon4" src="./media/icon_happy.png">
                            </div>
                            <div id='emotion_chart'></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-info" value="wait, loading video" id="startbutton"
                           disabled="disabled" onclick="toggleVideo()"></input>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

@endsection