@extends('layouts.app')
<style type="text/css">
    body { font-family: sans-serif; }
    h1 {
        font-family: serif;
        margin-bottom: 0;
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
                    <div class="card-header">  {{$book->title}}</div>

                    <div class="card-body">
                            <p><strong>Category : {{$book->category}}</strong></p>
                        <p><strong>Description :</strong>
                            {{ $book->description }}
                        </p>

                        <br>
                            <div>
                                <embed src="{{ asset('storage/'.$book->file_name) }}" style="width:600px; height:800px;" frameborder="0">
                            </div>
                            <br>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
