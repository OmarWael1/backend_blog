@extends('layouts.navbar')
@section('content')

@if(count($paints) != 0)
<main>
    <section class="container paintings-listing">
        <div class="paintings-container">
        @foreach($paints as $painting)
            <a href="{{route('paints', ['id' => $painting->id])}}">
                <div class="painting-item">
                    <div class="painting-item-image">
                        <img src="{{asset('storage/'.$painting->file_name)}}">
                    </div>
                    <div class="painting-desc painting-brief">
                        <h2>
                            {{$painting->title}}
                        </h2>
                        <span class="painting-data">
                            {{$painting->description}}
                        </span>
                        <div class="painting-options">
                            <span class="painting-date">
                                {{$painting->date_of_publish}}
                            </span>
                            <div class="visits">
                                عدد اللوحات
                                <span class="count">
                                    {{$painting->number_of_readers}}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
        </div>
    </section>
</main>
@endif

@endsection
