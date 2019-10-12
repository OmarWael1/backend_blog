@extends('layouts.navbar')
@section('content')
    <main>

        <section class="container articles-container no-grid-mobile">
            <div class="articles-categories center-mobile">
                <span class="title">
                        تصنيف الأبحاث
                </span>
                <ul>
                    @if(count($publishedResearches) != 0)
                        <li>
                            <a href="#published">
                                أبحاث نشرت
                            </a>
                        </li>
                    @endif
                    @if(count($unpublishedResearches) != 0)
                        <li>
                            <a href="#unpublished">
                                أبحاث لم تنشر
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
            @if(count($publishedResearches) != 0)
                <div id="published" class="articles-grid center-mobile">
                    <div class="title">
                        أبحاث نشرت
                    </div>
                    @foreach($publishedResearches as $article)
                        <div class="story" >
                            {{--<img src="{{asset('storage/'.$article->image_name)}}">--}}
                            <a href="{{route('readerResearch',$article->id)}}"  style="text-decoration:none">
                                <div class="story-content" style="padding-top:1px;">
                                <p class="story-title custom-margin">
                                    {{$article->title}}
                                </p>
                                    {{-- <p class="story-breif">
                                        {!! substr(strip_tags($article->body),0,900) !!}...
                                    </p> --}}
                                    <div class="story-details">
                                        <span class="story-publish-date">
                                                {{$article->date_of_publication}}
                                        </span>
                                        <span class="stroy-visit-count">
                                                عدد الزيارات
                                                <span class="count">{{$article->number_of_readers}}</span>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <br>
            @endif
            @if(count($unpublishedResearches) != 0)
            <div  id="unpublished" class="articles-grid center-mobile">
                <div class="title">
                    أبحاث لم تنشر
                </div>
                @foreach($unpublishedResearches as $article)
                    <div class="story" >
                        {{--<img src="{{asset('storage/'.$article->image_name)}}">--}}
                        <a href="{{route('readerResearch',$article->id)}}"  style="text-decoration:none">
                            <div class="story-content">
                            <p class="story-title">
                                {{$article->title}}
                            </p>
                                {{-- <p class="story-breif">
                                    {!! substr(strip_tags($article->body),0,900) !!}...
                                </p> --}}
                                <div class="story-details">
                                    <span class="story-publish-date">
                                            {{$article->date_of_publication}}
                                    </span>
                                    <span class="stroy-visit-count">
                                            عدد الزيارات
                                            <span class="count">{{$article->number_of_readers}}</span>
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <br>
            @endif
        </section>


    </main>
@endsection
