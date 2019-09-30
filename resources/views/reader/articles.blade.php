@extends('layouts.navbar')
@section('content')
    <main>

        <section class="container articles-container no-grid-mobile">
            <div class="articles-categories center-mobile">
                <span class="title">
                        تصنيف المقالات
                </span>
                <ul>
                    @if(count($islamicArticles) != 0)
                        <li>
                            <a href="#islamic">أسلاميه</a>
                        </li>
                    @endif
                    @if(count($jewishArticles) != 0)
                        <li>
                            <a href="#jewish">يهوديه</a>
                        </li>
                    @endif
                    @if(count($christianArticles) != 0)
                    <li>
                            <a href="#christian">مسيحيه</a>
                    </li>
                    @endif
                    @if(count($variedArticles) != 0)
                    <li>
                            <a href="#varied">متنوعه</a>
                    </li>
                    @endif
                    @if(count($literaryArticles) !=0)
                    <li>
                            <a href="#literary">ادبيه</a>
                    </li>
                    @endif
                    @if(count($artisticArticles) !=0)
                    <li>
                            <a href="#artistic">فنيه</a>
                    </li>
                    @endif
                    @if(count($metaphysicsArticles) !=0)
                    <li>
                        <a href="#metaphysics">غيبيات</a>
                    </li>
                    @endif
                </ul>
            </div>
            @if(count($islamicArticles) != 0)
                <div id="islamic" class="articles-grid center-mobile">
                    <div class="title">
                        الاسلامية
                    </div>
                    @foreach($islamicArticles as $article)
                        <div class="story" >
                            {{--<img src="{{asset('storage/'.$article->image_name)}}">--}}
                            <a href="{{route('readerArticle',$article->id)}}"  style="text-decoration:none">
                                <div class="story-content" style="padding-top:1px;">
                                <p class="story-title custom-margin">
                                    {{$article->title}}
                                </p>
                                    {{-- <p class="story-breif">
                                        {!! substr(strip_tags($article->body),0,900) !!}...
                                    </p> --}}
                                    <div class="story-details">
                                        <span class="story-publish-date">
                                                {{$article->date_of_publish}}
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
            @if(count($jewishArticles) != 0)
            <div  id="jewish" class="articles-grid center-mobile">
                <div class="title">
                    اليهوديه
                </div>
                @foreach($jewishArticles as $article)
                    <div class="story" >
                        {{--<img src="{{asset('storage/'.$article->image_name)}}">--}}
                        <a href="{{route('readerArticle',$article->id)}}"  style="text-decoration:none">
                            <div class="story-content">
                            <p class="story-title">
                                {{$article->title}}
                            </p>
                                {{-- <p class="story-breif">
                                    {!! substr(strip_tags($article->body),0,900) !!}...
                                </p> --}}
                                <div class="story-details">
                                    <span class="story-publish-date">
                                            {{$article->date_of_publish}}
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
            @if(count($christianArticles) != 0)
            <div id="christian" class="articles-grid center-mobile">
                <div class="title">
                    المسيحيه
                </div>
                @foreach($christianArticles as $article)
                    <div class="story" >
                        {{--<img src="{{asset('storage/'.$article->image_name)}}">--}}
                        <a href="{{route('readerArticle',$article->id)}}"  style="text-decoration:none">
                            <div class="story-content">
                            <p class="story-title">
                                {{$article->title}}
                            </p>
                                {{-- <p class="story-breif">
                                    {!! substr(strip_tags($article->body),0,900) !!}...
                                </p> --}}
                                <div class="story-details">
                                    <span class="story-publish-date">
                                            {{$article->date_of_publish}}
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
            @if(count($variedArticles) != 0)
            <div id="varied" class="articles-grid center-mobile">
                <div class="title">
                   متنوعه
                </div>
                @foreach($variedArticles as $article)
                    <div class="story" >
                        {{--<img src="{{asset('storage/'.$article->image_name)}}">--}}
                        <a href="{{route('readerArticle',$article->id)}}"  style="text-decoration:none">
                            <div class="story-content">
                            <p class="story-title">
                                {{$article->title}}
                            </p>
                                {{-- <p class="story-breif">
                                    {!! substr(strip_tags($article->body),0,900) !!}...
                                </p> --}}
                                <div class="story-details">
                                    <span class="story-publish-date">
                                            {{$article->date_of_publish}}
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
            @if(count($literaryArticles) != 0)
            <div id="literary" class="articles-grid center-mobile">
                <div class="title">
                    ادبيه
                </div>
                @foreach($literaryArticles as $article)
                    <div class="story" >
                        {{--<img src="{{asset('storage/'.$article->image_name)}}">--}}
                        <a href="{{route('readerArticle',$article->id)}}"  style="text-decoration:none">
                            <div class="story-content">
                            <p class="story-title">
                                {{$article->title}}
                            </p>
                                {{-- <p class="story-breif">
                                    {!! substr(strip_tags($article->body),0,900) !!}...
                                </p> --}}
                                <div class="story-details">
                                    <span class="story-publish-date">
                                            {{$article->date_of_publish}}
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
            @if(count($artisticArticles) != 0)
            <div id="artistic" class="articles-grid center-mobile">
                <div class="title">
                    فنيه
                </div>
                @foreach($artisticArticles as $article)
                    <div class="story" >
                        {{--<img src="{{asset('storage/'.$article->image_name)}}">--}}
                        <a href="{{route('readerArticle',$article->id)}}"  style="text-decoration:none">
                            <div class="story-content">
                            <p class="story-title">
                                {{$article->title}}
                            </p>
                                {{-- <p class="story-breif">
                                    {!! substr(strip_tags($article->body),0,900) !!}...
                                </p> --}}
                                <div class="story-details">
                                    <span class="story-publish-date">
                                            {{$article->date_of_publish}}
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
            @if(count($metaphysicsArticles) != 0)
            <div id="metaphysics" class="articles-grid center-mobile">
                <div class="title">
                    غيبيات
                </div>
                @foreach($metaphysicsArticles as $article)
                    <div class="story" >
                        {{--<img src="{{asset('storage/'.$article->image_name)}}">--}}
                        <a href="{{route('readerArticle',$article->id)}}"  style="text-decoration:none">
                            <div class="story-content">
                            <p class="story-title">
                                {{$article->title}}
                            </p
                                {{-- <p class="story-breif">
                                    {!! substr(strip_tags($article->body),0,900) !!}...
                                </p> --}}
                                <div class="story-details">
                                    <span class="story-publish-date">
                                            {{$article->date_of_publish}}
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