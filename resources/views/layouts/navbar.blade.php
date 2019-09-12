<!DOCTYPE html>
<html dir="rtl" lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>دكتورة زينب عبد العزيز</title>
    <link rel="stylesheet" href="{{asset('/css/styles.css')}}">
    <script type="text/javascript" src="{{asset('/js/script.js')}}"></script>
</head>
<body>

<header>
    <div class="container header-options">
           <li><a style=" color: #ffffff;" href="{{ url('locale/fr') }}" ><i class="fa fa-language"></i> FR</a></li>
           <li><a  style=" color: #ffffff;" href="{{ url('locale/ar') }}" ><i class="fa fa-language"></i> AR</a></li>
        <a class="social-btn" href="https://www.facebook.com/ZeinabAbdelazizPaintings" target="_blank">
            <img src="{{asset('storage/facebook.png')}}">
        </a>
    </div>
</header>

<nav class="navigation">
    <ul class="container navigation-list">
        <li class="navigation-list-item logo">
            <a href="{{route('home')}}">
                <img src="{{asset('storage/name.png')}}">
            </a>
        </li>

            <li class="navigation-list-item  selected-link" >
                <a href="{{route('home')}}">
                    {{trans('app.mainPage')}}
                </a>
            </li>

        @if(App::isLocale('ar'))

            <li class="navigation-list-item">
                <a href="{{route('about')}}">
                    السيره الذاتيه
                </a>
            </li>

            <li class="navigation-list-item">
                <a href="{{route('readerArticles')}}">
                    مقالات
                </a>
            </li>

            <li class="navigation-list-item">
                <a href="{{route('readerBooksAndResearches')}}">
                    كتب و ابحاث
                </a>
            </li>

            <li class="navigation-list-item">
                <a href="{{route('readerStories')}}">
                    قصص قصيره
                </a>
            </li>

            <li class="navigation-list-item">
                <a href="{{route('readerVideos')}}">
                    فيديوهات
                </a>
            </li>

        @else
            <li class="navigation-list-item">
                <a href="{{route('readerFrArticles')}}">
                    articles
                </a>
            </li>
        @endif

            <li class="navigation-list-item">
                <a href="{{route('readerQuran')}}">
                    {{trans('app.quranTranslation')}}
                </a>
            </li>


    </ul>
</nav>

@yield('content')


@extends('layouts.footer')
</body>

</html>
