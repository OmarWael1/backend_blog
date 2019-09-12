<footer>
    <nav class="navigation footer-nav">
        <ul class="container navigation-list">
            <li class="navigation-list-item logo">
                <a href="{{route('home')}}">
                    <img src="{{asset('storage/name-white.png')}}">
                </a>
            </li>

            <li class="navigation-list-item">
                <a href="{{route('home')}}">
                    الرئسية
                </a>
            </li>

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
                    كتب وأبحاث
                </a>
            </li>


            <li class="navigation-list-item">
                <a href="{{route('readerQuran')}}">
                    ترجمة القرآن
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

        </ul>
    </nav>

    <div class="container header-options footer-header">
        <button class="search-btn">
            <img src="{{asset('storage/search.png')}}">
            <span>بحث</span>
        </button>

        <button class="lang-btn">
            <span>francais</span>
            <img src="{{asset('storage/arrow-down.png')}}">
        </button>

        <a class="social-btn" href="https://www.facebook.com/ZeinabAbdelazizPaintings" target="_blank">
            <img src="{{asset('storage/facebook.png')}}">
        </a>
    </div>

</footer>