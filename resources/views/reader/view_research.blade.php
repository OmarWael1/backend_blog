@extends('layouts.navbar')
@section('content')
<main>
        <section class="container view-item-content">
                <h2>
                    {{$research->title}}
                </h2>
            <br>

            <p class="view-item-conetent-data">
                {!! strip_tags($research->body) !!}
            </p>
            <div class="tags-visits">
                <div class="visits">
                    عدد الزيارات <span>{{$research->number_of_readers}}</span>
                </div>

                <div class="visits">
                    تاريخ النشر <span>{{$research->date_of_publication}}</span>
                </div>
                <br>
            </div>
        </section>
    </main>
@endsection