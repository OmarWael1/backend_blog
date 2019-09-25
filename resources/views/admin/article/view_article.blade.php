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
   
    p {
        font-size: 14px;
    }
</style>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">  {{$article->title}}</div>
                    <div class="card-body">
                        <img src="{{asset('storage/'.$article->image_name)}}" style=" width: 50%; height: 50%;">

                        <br>
                        <article>
                            <p><strong>Type : {{$article->type}}</strong> , <strong>Category : {{$article->category}}</strong></p>

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
