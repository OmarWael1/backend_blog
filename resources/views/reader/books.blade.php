@extends('layouts.navbar')
@section('content')
    <main>
        <section class="container articles-container">
            <div class="articles-categories center-mobile">
                <span class="title">
                        تصنيف الكتب
                </span>
                <ul>
                    @if(count($publishedBooks) !=0)
                        <li>
                            <a href="#publishedBooks">كتب نشرت</a>
                        </li>
                    @endif
                    @if(count($unpublishedBooks) != 0)
                        <li>
                            <a href="#unpublishedBooks">كتب لم تنشر</a>
                        </li>
                    @endif
                </ul>
            </div>
            @if(count($publishedBooks) !=0)

              <div id="publishedBooks" class="articles-grid no-grid-mobile ">
                <div class="title">
                        كتب نشرت
                </div>
                @foreach($publishedBooks as $book)
                <div  class="story">
                        <img src="{{asset('storage/34.jpg')}}">
                    <a href="{{route('readerBook',$book->id)}}"  style="text-decoration:none">
                    <div class="story-content">
                            <p class="story-title">
                                   {{$book->title}}
                            </p>
                            <p class="story-breif">
                                    {{$book->description}}
                            </p>
                            <div class="story-details">
                                    <span class="story-publish-date">
                                            {{$book->date_of_publication}}
                                    </span>
                                    <span class="stroy-visit-count">
                                            عدد الزيارات 
                                            <span class="count">{{$book->number_of_readers}}</span>
                                    </span>
                            </div>
        
                    </div>
                    </a>
                </div>
                @endforeach
            </div>
            @endif
                <br>
            @if(count($unpublishedBooks) != 0)
                <div id="unpublishedBooks" class="articles-grid no-grid-mobile">
                    <div class="title">
                        كتب لم تنشر
                    </div>
                    @foreach($unpublishedBooks as $book)
                        <div  class="story">
                            <img src="{{asset('storage/34.jpg')}}">
                            <a href="{{route('readerBook',$book->id)}}"  style="text-decoration:none">
                                <div class="story-content">
                                <p class="story-title">
                                       {{$book->title}}
                                </p>
                                    <p class="story-breif">
                                        {{$book->description}}
                                    </p>
                                    <div class="story-details">
                                        <span class="story-publish-date">
                                                {{$book->date_of_publication}}
                                        </span>
                                        <span class="stroy-visit-count">
                                                عدد الزيارات
                                                <span class="count">{{$book->number_of_readers}}</span>
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