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
                    <div class="card-header">  {{$video->title}}</div>

                    <div class="card-body">
                        <br>
                            <div>
                                <video style="width: 400px; height: 200px;" src="{{ asset('storage/'.$video->file_name) }}" autobuffer autoloop loop controls ></video>
                            </div>
                            <br>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
