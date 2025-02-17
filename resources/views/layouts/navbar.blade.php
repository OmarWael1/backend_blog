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
        <div class="language-conatiner">
            @if(App::isLocale('ar'))
                <button class="lang-btn fr">
                    <a style=" color: #ffffff; text-decoration: none" href="{{ url('locale/fr') }}">fr</a>
                </button>
            @else
                <button class="lang-btn eg">
                     <a style=" color: #ffffff; text-decoration: none" href="{{ url('locale/ar') }}">ar</a>
                </button>
            @endif
        </div>
           {{--<li><a style=" color: #ffffff;" href="{{ url('locale/fr') }}" ><i class="fa fa-language"></i> FR</a></li>--}}
           {{--<li><a  style=" color: #ffffff;" href="{{ url('locale/ar') }}" ><i class="fa fa-language"></i> AR</a></li>--}}
        <a class="social-btn" href="https://www.facebook.com/ZeinabAbdelazizPaintings" target="_blank">
            <img src="{{asset('storage/facebook.png')}}">
        </a>
    </div>
</header>

<nav class="navigation-header">
    <ul class="container navigation-list-mobile">
        <li class="header-item menu-toggle mobile-only">
            <a href="#" id="menu-toggle">
                <img src="{{asset('storage/menu.png')}}">
            </a>
        </li>
        <li class="header-item header-item-logo mobile-only">
            <a href="{{route('home')}}">
               <img width="200" height="50" src="{{asset('storage/logo-dark@3x.png')}}">
            </a>
        </li>
    </ul>
</nav>

<nav class="navigation">
    <ul class="container navigation-list">

        @if(App::isLocale('ar'))
            <li class="navigation-list-item">
                <a href="{{route('readerArticles')}}">
                    مقالات
                </a>
            </li>

            <li class="navigation-list-item">
                <a href="{{route('readerResearches')}}">
                     ابحاث
                </a>
            </li>

            <li class="navigation-list-item">
                <a href="{{route('readerBooks')}}">
                    كتب
                </a>
            </li>

            <li class="navigation-list-item">
                <a href="{{route('readerStories')}}">
                    قصص قصيرة
                </a>
            </li>

            <li class="navigation-list-item">
                <a href="{{route('readerVideos')}}">
                    فيديوهات
                </a>
            </li>

            <li class="navigation-list-item">
                <a href="{{route('readerCollections')}}">
                    لوحات فنية
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
