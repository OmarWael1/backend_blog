@extends('layouts.navbar')
@section('content')

    <main>
       <section class="container stories-container no-grid-mobile">
         <br>
          <br>
        <div class="doc-cv-section-title">
          <h4>فيديوهات</h4>
        </div>
           <div class="stories-grid center-mobile">

               @foreach($videos as $video)
                <div class="story">
                    <img src="{{asset('storage/34.jpg')}}">
                    <a href="{{route('readerVideo',$video->id)}}"  style="text-decoration:none">
                    <div class="story-content">
                        <p class="story-title">
                               {{$video -> title}}
                        </p>
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


        @endforeach
         </div>
       </section>
    </main>

@endsection
