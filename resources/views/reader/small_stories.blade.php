@extends('layouts.navbar')
@section('content')
    <main>
       <section class="container articles-container no-grid-mobile">
          @if(count($stories) != 0)

               <div class="doc-cv-section-title">
                   قصص قصيرة
               </div>
            <div class="articles-grid center-mobile">
                @foreach($stories as $story)
                <div class="story" >
                    {{--<img src="{{asset('storage/'.$story->image_name)}}">--}}
                    <a href="{{route('readerStory',$story->id)}}"  style="text-decoration:none">
                        <div class="story-content">
                            <p class="story-title">
                                {{$story->title}}
                            </p>
                            {{-- <p class="story-breif">
                                {!! substr(strip_tags($story->body),0,900) !!}...
                            </p> --}}
                            <div class="story-details">
                                <span class="story-publish-date">
                                        {{$story->date_of_publication}}
                                </span>
                                <span class="stroy-visit-count">
                                        عدد الزيارات
                                        <span class="count">{{$story->number_of_readers}}</span>
                                </span>
                            </div>
                        </div>
                    </a>
                </div>    
                @endforeach
        </div>
          @endif

       </section>

    </main> 
   @endsection