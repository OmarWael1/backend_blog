<footer>

    <nav class="navigation footer-nav">
        <ul class="container navigation-list has-white-background">
            <li class="navigation-list-item logo">
                <a href="{{route('home')}}">
                    <img src="{{asset('storage/name.png')}}">
                </a>
            </li>



            {{-- @if(App::isLocale('ar')) --}}

                {{--<li class="navigation-list-item">--}}
                    {{--<a href="{{route('about')}}">--}}
                        {{--السيره الذاتيه--}}
                    {{--</a>--}}
                {{--</li>--}}

                {{-- <li class="navigation-list-item">
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
                    <a href="{{route('readerPaints')}}">
                        لوحات فنيه
                    </a>
                </li>

                <li class="navigation-list-item">
                    <a href="{{route('readerBooks')}}">
                        كتب
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
            </li> --}}



        </ul>
    </nav>

</footer>