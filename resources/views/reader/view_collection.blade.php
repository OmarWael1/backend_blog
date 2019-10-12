@extends('layouts.navbar')
@section('content')

@if($collection)
<main>
    <section class="container paintings">
        <div class="painting-desc">
            <h2>
                {{$collection->title}}
            </h2>
            <span class="painting-data">
                {{$collection->description}}
            </span>
            <div class="painting-options">
                <span class="painting-date">
                    {{$collection->date_of_publish}}
                </span>
                <div class="visits">
                    عدد اللوحات
                    <span class="count">
                        {{$collection->number_of_readers}}
                    </span>
                </div>
            </div>
        </div>
        @foreach($paintings as $painting)
        <div class="painting">
            <img class="painting-image" src="{{asset('storage/'.$painting->file_name)}}">
            <p class="painting-desc-text">{{$painting->description}}</p>
        </div>
        @endforeach
    </section>
</main>
@endif

@endsection
