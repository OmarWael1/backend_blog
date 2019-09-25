@extends('layouts.navbar')
@section('content')
<main>
        <section class="container view-item-content">

            <div class="story-content">
                <span class="story-title">
                    {{$book->title}}
                </span>
                <p class="story-breif">
                    {{$book -> description}}
                </p>
                <div  class="view-item-conetent-data">
                    <embed  src="{{ asset('storage/'.$book->file_name) }}" style="width:900px; height:800px;" frameborder="0">
                </div>
            </div>
        </section>
</main>
@endsection