@extends('layouts.navbar')
@section('content')
<main>
    <section class="container greeting no-grid-mobile">
        <div class="doctor-image">
            <img src="{{asset('storage/34.jpg')}}">
        </div>
        <div class="geeting-text">
            <span class="welcome">أهلا بكم في</span>
            <span class="official-site">الموقع الرسمي</span>
            <span class="doctor-name">للدكتورة زينب عبد العزيز</span>
        </div>
        <div class="navigate-down">
            <a href="#aboutSection">
                <span>انزل للاسفل</span>
                <img src="{{asset('storage/chevron.png')}}">
            </a>
        </div>
    </section>

    <section id="aboutSection" class="container about-doctor no-grid-mobile">
        <div class="about-text">
                <span class="about-doctor-title">
                        عن الدكتورة
                </span>

            <p>
                صُدفة تلك أم منحة من الله عزّ و جلّ  هى التى دفعت دكتورة زينب عبد العزيز أستاذة الأدب الفرنسى و تاريخ الفنون بالجامعات المصرية
                إلى تكريس حياتها و جهودها على مدى عمرها  لخدمة قضية شائكة بالغة التعقيد تدرأ بها عن عقيدة الإسلام
                ما يلّفقه له خصومه فى الخارج، فأصدرت ما يربو على عشرين كتابا علميا باللغة العربية و الفرنسية
                ، و ذرعت محافل المعرفة شرقا و غربا تذود عن العقيدة بحماس عرّضها لهجوم مكثّف.
            </p>
        </div>
        <div class="about-image">
            <img src="{{asset('storage/about.png')}}">
        </div>
        <div class="important-work-cards mobile-flex-column">
            <div class="card is-mobile-fullwidth">
                <div class="card-header">
                    <div class="icon quran"></div>
                    <div class="header-title">
                        ترجمة القرآن
                    </div>

                </div>
                <div class="content">
                    <p>صُدفة تلك أم منحة من الله عزّ و جلّ  هى التى دفعت دكتورة زينب عبد العزيز أستاذة الأدب الفرنسى و تاريخ الفنون بالجامعات المصرية إلى تكريس حياتها</p>
                </div>

                <div class="options">
                    <a href="#">المزيد</a>
                </div>
            </div>
            <div class="card is-mobile-fullwidth">
                <div class="card-header">
                    <div class="icon books"></div>
                    <div class="header-title">
                        كتب وابحاث
                    </div>
                </div>
                <div class="content">
                    <p>صُدفة تلك أم منحة من الله عزّ و جلّ  هى التى دفعت دكتورة زينب عبد العزيز أستاذة الأدب الفرنسى و تاريخ الفنون بالجامعات المصرية إلى تكريس حياتها</p>
                </div>

                <div class="options">
                    <a href="#">المزيد</a>
                </div>
            </div>
            <div class="card is-mobile-fullwidth">
                <div class="card-header">
                    <div class="icon articles"></div>
                    <div class="header-title">
                        مقالات
                    </div>
                </div>
                <div class="content">
                    <p>صُدفة تلك أم منحة من الله عزّ و جلّ  هى التى دفعت دكتورة زينب عبد العزيز أستاذة الأدب الفرنسى و تاريخ الفنون بالجامعات المصرية إلى تكريس حياتها</p>
                </div>
                <div class="options">
                    <a href="#">المزيد</a>
                </div>
            </div>
        </div>
        <div class="important-work-text">
                <span class="about-important-works">
                        أهم اعمال الدكتورة
                </span>
            <p>
                و حسبُ كل عالم أن يكون مثل هذا العطاء من نصيبه ، و لكن هذه السيدة لم تقنع بهذا المجد التليد وحده ، فإذا هى تضيف إلى جهودها العلمية و جهادها الشاق عشق الفن التصويرى حتى غدت من نجومه اللامعات المبدعات ، تنأى بنفسها عن لعبة التجريد.
            </p>
        </div>
    </section>

    <section class="container most-read no-grid-mobile">
        <div class="section-header">
                <span class="main-header">
                     الأكثر قراءة
                </span>
            <span class="sub-header">
                    اهم مقالات الدكتورة زينب عبدالعزيز ومختارات اعمالها
                </span>
        </div>
        <div class="most-read-articles  mobile-flex-column no-background-mobile">
            @foreach($articles as $article)
            <div class="atricle is-mobile-fullwidth">
                {{--<img src="{{asset('storage/'.$article->image_name)}}">--}}
                <a href="{{route('readerArticle',$article->id)}}"  style="text-decoration:none">
                <div class="atricle-content">
                    <span class="article-content-header">{{$article->title}}</span>
                    <p> {{ str_limit(strip_tags($article->body),300)  }} ...</p>
                    <p>{{$article->date_of_publish}}</p>
                </div>
                </a>
            </div>
            @endforeach
        </div>
    </section>

    <section class="container researches-books no-grid-mobile">
        <div class="section-header">
                    <span class="main-header">
                            كتب و ابحاث
                    </span>
        </div>

        <div class="researches-books-container no-grid-mobile no-background-mobile">
            @foreach($researches as $research)
            <div class="book">
                <img class="book-img" src="{{asset('storage/bg.png')}}">
                <div class="book-desc">
                            <span class="book-title">
                                {{$research->title}}
                            </span>
                    <p>{{$research->date_of_publication}}</p>
                </div>
            </div>
            @endforeach

        </div>
    </section>

    <section class="container videos no-grid-mobile no-background-mobile">
        <div class="section-header">
                        <span class="main-header">
                                فيديوهات
                        </span>
        </div>

        @foreach($videos as $video)
        <div class="video-container">
            <video id="vid" src="{{asset('storage/'.$video->file_name)}}"></video>
            <div class="play-button">
                <button id="play">
                    <img src="{{asset('storage/fa-solid-play.png')}}">
                </button>

                <p class="video-desc">
                    {{$video->title}}
                    <br>
                    {{$video->description}}
                </p>
            </div>
            <div class="video-controls">
                <button id="pause-play">
                    <img src="{{asset('storage/pause.png')}}">
                </button>

                <div id="progress-bar">
                    <div id="progress-bar-filler">

                    </div>
                </div>

                <button id="fullscreen">
                    <img src="{{asset('storage/fullscreen.png')}}">
                </button>
            </div>
        </div>
        @endforeach
    </section>

    <section class="container opinions">
        <div class="section-header">
                        <span class="main-header">
                                أراء وكتابات
                        </span>
        </div>

        <div class="opinion-container">
            <div class="opinion-item">
                <p>“ صُدفة تلك أم منحة من الله عزّ و جلّ  هى التى دفعت دكتورة زينب عبد العزيز أستاذة الأدب الفرنسى و تاريخ الفنون بالجامعات المصرية إلى تكريس حياتها و جهودها على مدى عمرها  لخدمة قضية شائكة بالغة التعقيد تدرأ بها عن عقيدة الإسلام ما يلّفقه له خصومه فى الخارج. ”</p>
                <span class="opinion-issuer">
                                د. ثروت عكاشة
                        </span>
                <span class="time-place">
                                المعادى فى 5 يناير2005
                        </span>
            </div>

        </div>

        <div class="commenters">
            <div class="commenter">
                <img src="{{asset('storage/Pantheon-770x433.jpg')}}">
            </div>
            <div class="commenter">
                <img src="{{asset('storage/Pantheon-770x433.jpg')}}">
            </div>
            <div class="commenter">
                <img src="{{asset('storage/Pantheon-770x433.jpg')}}">
            </div>
        </div>
    </section>



</main>

@endsection
