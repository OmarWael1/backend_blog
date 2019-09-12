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
                    <div class="card-header">  {{$story->title}}</div>

                    <div class="card-body">
                        <article>
                         <br>
                            <p>
                             {!! strip_tags($story->body) !!}
                            </p>

                            <strong>{{$story->date_of_publication}}</strong>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
