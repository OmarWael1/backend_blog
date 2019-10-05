@extends('layouts.navbar')
@section('content')

<main>
    <section class="container paintings">
        <div class="painting-desc">
            <h2></h2>
            <span class="painting-data">
            </span>
            <div class="painting-options">
                <span class="painting-date">
                </span>
                <div class="visits">
                    عدد اللوحات
                    <span class="count">
                    </span>
                </div>
            </div>
        </div>

        <div class="painting">
            <img class="painting-image" src="../images/Pantheon-770x433.jpg">
            <p class="painting-desc-text"></p>
        </div>
    </section>
</main>
@endsection
