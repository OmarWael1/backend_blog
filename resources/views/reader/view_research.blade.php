@extends('layouts.navbar')
@section('content')
    <section class="container view-item-content">
        <h2>
            {{$research->title}}
        </h2>
        <br>
        <p class="view-item-conetent-data">
            {!! strip_tags($research->body,'<p><br><h1><h2><h3><img>') !!}
        </p>
        <div class="tags-visits">
            <div class="tags">
                <div class="tag">
                    {{$research->date_of_publication}}
                </div>
            </div>
            <div class="visits">
                عدد الزيارات <span>{{$research->number_of_readers}}</span>
            </div>
        </div>
    </section>
</main>
@endsection