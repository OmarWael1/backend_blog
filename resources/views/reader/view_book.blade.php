@extends('layouts.navbar')
@section('content')
<main>
        <section class="container view-item-content">

            <div class="story-content">
                <p class="story-title">
                    {{$book->title}}
                </p>
                <p class="story-breif">
                    {{$book -> description}}
                </p>
                <div  class="view-item-conetent-data">
                    <embed  src="{{ asset('storage/'.$book->file_name) }}" style="width:100%; height:800px;" frameborder="0">
                </div>
            </div>
        </section>
</main>
@endsection