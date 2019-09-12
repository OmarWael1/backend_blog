@extends('layouts.navbar')
@section('content')

    <main>
       <section class="container articles-stories no-grid-mobile">
         <br>
          <br>
        <div class="doc-cv-section-title">
          <h4>فيديوهات</h4>
        </div>
        @foreach($videos as $video)
        <div class="stories-grid center-mobile">
            <div class="story">
                <img src="{{asset('storage/bg.png')}}">
                <a href="{{route('readerVideo',$video->id)}}"  style="text-decoration:none">
                <div class="story-content">
                    <span class="story-title">
                           {{$video -> title}}
                    </span>
                    <div class="story-details">
                            <span class="story-publish-date">
                                    {{$video -> date_of_publication}}
                            </span>
                            <span class="stroy-visit-count">
                                    عدد الزيارات
                                    <span class="count">{{$video -> number_of_readers}}</span>
                            </span>
                    </div>

                </div>
                </a>
            </div>
        </div>
        @endforeach
       </section>

    </main>
    {{--one video--}}
    {{--<div class="video-container">--}}
        {{--<video id="vid" src="{{asset('storage/'.$video->file_name)}}"></video>--}}
        {{--<div class="play-button">--}}
            {{--<button id="play">--}}
                {{--<img src="{{asset('storage/fa-solid-play.png')}}">--}}
            {{--</button>--}}

            {{--<p class="video-desc">--}}
                {{--{{$video->title}}--}}
                {{--<br>--}}
                {{--{{$video->description}}--}}
            {{--</p>--}}
        {{--</div>--}}
        {{--<div class="video-controls">--}}
            {{--<button id="pause-play">--}}
                {{--<img src="{{asset('storage/pause.png')}}">--}}
            {{--</button>--}}

            {{--<div id="progress-bar">--}}
                {{--<div id="progress-bar-filler">--}}

                {{--</div>--}}
            {{--</div>--}}

            {{--<button id="fullscreen">--}}
                {{--<img src="{{asset('storage/fullscreen.png')}}">--}}
            {{--</button>--}}
        {{--</div>--}}
    {{--</div>--}}
@endsection
