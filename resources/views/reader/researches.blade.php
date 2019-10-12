@extends('layouts.navbar')
@section('content')
    <main>
        <section class="container articles-container no-grid">
            @if(count($researches) != 0)
            <div id="researches" class="articles-grid mobile-padding">
                <div class="title">
                    كل الابحاث
                </div>
                @foreach($researches as $research)
                    <div class="story">
                        <img class="is-hidden-mobile" src="{{asset('storage/34.jpg')}}">
                        <a href="{{route('readerResearch',$research->id)}}"  style="text-decoration:none">
                            <div class="story-content">
                            <p class="story-title">
                                   {{$research->title}}
                            </p>
                                <p class="story-breif">
                                    {{$research->description}}
                                </p>
                                <div class="story-details">
                                    <span class="story-publish-date">
                                            {{$research->date_of_publication}}
                                    </span>
                                    <span class="stroy-visit-count">
                                            عدد الزيارات
                                            <span class="count">{{$research->number_of_readers}}</span>
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