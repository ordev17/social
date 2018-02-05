@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="col-md-8 col-sm-8 col-xs-8">
                @foreach($messages as $message)
                    <div class="well">
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-message-id="{{$message->id}}" data-target="#{{$message->id}}">
                            {{$message->user->username}}
                        </button>

                        <div id="{{$message->id}}" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Message from user:{{$message->user->name}}</h4>
                                    </div>
                                    <div class="modal-body">
                                        {{$message->content}}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">
                <img class="img-responsive" id="ad" src="img/undefined.jpg">
            </div>
        </div>
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
            <input type="button" class="btn btn-info" value="wait, loading video" id="startbutton"
                   disabled="disabled" onclick="toggleVideo()"></input>
        </div>
    </div>
@endsection