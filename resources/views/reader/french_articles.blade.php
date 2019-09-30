@extends('layouts.navbar')
@section('content')
    <main>

        <section class="container articles-container no-grid-mobile">
            <div class="articles-categories center-mobile">

            </div>
            <div id="islamic" class="articles-grid center-mobile">
                <div class="title">

                </div>
                @foreach($articles as $article)
                    <div class="story" >
                        {{-- <img src="{{asset('storage/'.$article->image_name)}}"> --}}
                        <a href="{{route('readerArticle',$article->id)}}"  style="text-decoration:none">
                            <div class="story-content">
                            <p class="story-title">
                                {{$article->title}}
                            </p>
                                {{-- <p class="story-breif">
                                    {!! substr(strip_tags($article->body),0,200) !!}...
                                </p> --}}
                                <div class="story-details">
                                    <span class="story-publish-date">
                                            {{$article->date_of_publish}}
                                    </span>
                                    <span class="stroy-visit-count">
                                            {{trans('app.numberOfVisitors') }}
                                            <span class="count">{{$article->number_of_readers}}</span>
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <br>

        </section>


    </main>
@endsection