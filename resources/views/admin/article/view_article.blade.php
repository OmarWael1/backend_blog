@extends('layouts.app')
<style type="text/css">
    body { font-family: sans-serif; }
    h1 {
        font-family: serif;
        margin-bottom: 0;
    }
    article {
        width: 600px;
        margin-left: auto;
        margin-right: auto;
    }
    .image-wrapper {
        width: 200px;
        float: left;
        padding-right: 25px;
        padding-bottom: 10px;
    }
    .image-wrapper img {
        width: 100%;
    }

    .image-wrapper span {
        font-family: sans-serif;
        font-size: 10px;
        color: #ccc;
    }

    .article-meta {
        font-family: sans-serif;
        color: #aaa;
        font-size: 12px;
    }
    p {
        font-size: 14px;
    }
</style>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">  {{$article->title}}</div>

                    <div class="card-body">
                        <article>
                            <p><strong>Type : {{$article->type}}</strong> , <strong>Category : {{$article->category}}</strong></p>

                            <div>
                                <img src="{{asset('storage/'.$article->image_name)}}" style=" width: 50%; height: 50%;">
                            </div>
                            <br>
                            <p>
                             {!! strip_tags($article->body) !!}
                            </p>

                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
