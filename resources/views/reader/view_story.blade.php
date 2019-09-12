@extends('layouts.navbar')
@section('content')
<main>
        <section class="container view-item-content">
          <h2>
           {{$story->title}}
          </h2>
           <br>
            <p class="view-item-conetent-data">
                {!! strip_tags($story->body) !!}
            </p>
            <div class="tags-visits">
                <div class="tags">
                    <div class="tag">
                        {{$story->date_of_publication}}
                    </div>
                </div>
                <div class="visits">
                    عدد الزيارات <span>{{$story->number_of_readers}}</span>
                </div>
            </div>
        </section>
</main>
@endsection