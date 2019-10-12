@extends('layouts.navbar')
@section('content')

@if(count($collections) != 0)
<main>
    <section class="container paintings-listing">
        <div class="paintings-container">
        @foreach($collections as $collection)
            <a href="{{route('readerCollection', ['id' => $collection->id])}}">
                <div class="painting-item">
                    <div class="painting-item-image">
                        <img src="{{asset('storage/'.$collection->file_name)}}">
                    </div>
                    <div class="painting-desc painting-brief">
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
                </div>
            </a>
        @endforeach
        </div>
    </section>
</main>
@endif

@endsection
