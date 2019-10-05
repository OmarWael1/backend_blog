@extends('layouts.navbar')
@section('content')
<main>
    <section>
    <br>
        <h3 class="video-container" style="justify-content: center">
            {{$video->title}}
        </h3><br>
        <div class="video-container" style="justify-content: center" >
            <iframe style="width:500px; height:345px;"  src="{{$video->link}}">
            </iframe>
        </div>
    <br>
    </section>
</main>
@endsection