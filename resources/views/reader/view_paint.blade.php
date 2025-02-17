@extends('layouts.navbar')
@section('content')

@if($paint)
<main>
    <section class="container paintings">
        <div class="painting-desc">
            <h2>
                {{$paint->title}}
            </h2>
            <span class="painting-data">
                {{$paint->description}}
            </span>
            <div class="painting-options">
                <span class="painting-date">
                    {{$paint->date_of_publish}}
                </span>
                <div class="visits">
                    عدد اللوحات
                    <span class="count">
                        {{$paint->number_of_readers}}
                    </span>
                </div>
            </div>
        </div>

        <div class="painting">
            <img class="painting-image" src="{{asset('storage/'.$paint->file_name)}}">
            <p class="painting-desc-text"></p>
        </div>
    </section>
</main>
@endif

@endsection
