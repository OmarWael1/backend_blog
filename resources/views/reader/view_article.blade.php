@extends('layouts.navbar')
@section('content')
<main>
    <section class="view-item-container">
@if( asset('storage/'.$article->image_name) )
   <div class="item-img">
        <img src="http://159.65.33.169/storage/PICT0918.JPG.JPG">
   </div>
@endif
   <div class="view-title-date">
           <span class="title">
                   {{$article->title}}
           </span>
       <span class="date">
                   {{$article->date_of_publish}}
           </span>
   </div>
</section>

<section class="container view-item-content">
   <div class="tags-visits">
       <div class="tags">
           <div class="tag">
               {{$article->category}}
           </div>
       </div>
       <div class="visits">
           {{trans('app.numberOfVisitors') }} <span>{{$article->number_of_readers}}</span>
       </div>
   </div>

   <p class="view-item-conetent-data">
       {!! strip_tags($article->body,'<p><br><img><h3><h2>') !!}
   </p>

</section>
<section class="container most-read no-grid-mobile">
<div class="section-header">
       <span class="main-header">
           {{trans('app.mostReading')}}
       </span>
   <span class="sub-header">
          {{trans('app.importantArticles')}}
       </span>
</div>
<div class="most-read-articles no-background-mobile">
   @foreach($articles as $article)
       <div class="atricle article-wrapper">
           <img src="{{asset('storage/'.$article->image_name)}}">
           <a href="{{route('readerArticle',$article->id)}}"  style="text-decoration:none">
            <div class="atricle-content">
                <p class="article-content-header">{{$article->title}}</p>
                <p class="article-content-body"> {{ str_limit(strip_tags($article->body),100)  }} ...</p>
                <p class="article-content-body_absolute">{{$article->date_of_publish}}</p>
            </div>
           </a>
       </div>
   @endforeach
</div>
</section>
</main>
@endsection