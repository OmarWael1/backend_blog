@extends('layouts.navbar')
@section('content')
<main>
    <section>
    <br>
        <div class="video-container" style="width: 50%">
            <video id="vid" src="{{asset('storage/'.$video->file_name)}}"></video>
            <div class="play-button">
                <button id="play">
                    <img src="{{asset('storage/fa-solid-play.png')}}">
                </button>

                <p class="video-desc">
                    {{$video->title}}
                    <br>
                    {{$video->description}}
                </p>
            </div>
            <div class="video-controls">
                <button id="pause-play">
                    <img src="{{asset('storage/pause.png')}}">
                </button>

                <div id="progress-bar">
                    <div id="progress-bar-filler">

                    </div>
                </div>

                <button id="fullscreen">
                    <img src="{{asset('storage/fullscreen.png')}}">
                </button>
            </div>
        </div>
    <br>
    </section>
</main>
@endsection