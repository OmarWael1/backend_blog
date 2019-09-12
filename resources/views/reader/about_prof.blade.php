@extends('layouts.navbar')
@section('content')
    <main>
        <section class="container greeting doc-cv no-grid-mobile">
            <div class="doctor-image">
                <img src="{{asset('storage/bg.png')}}">
            </div>
            <div class="geeting-text">
                <span class="doc-cv-name-title">الاسم  </span>
                <span class="doc-cv-name">زينب عبد العزيز</span>

                <div class="doc-cv-birth">
                    <span class="doc-cv-birth-title">محل و تاريخ الميلاد</span>
                    <span class="doc-cv-birth-date">الإسكندرية في  19 / 1 / 1935</span>
                </div>
            </div>



        </section>

        <section class="container education">
            <div class="doc-cv-section-title">
                الدراسات الجامعية
            </div>

            <div class="doc-cv-grid">
                    <div class="education-item">
                        <div class="education-header">
                            <div class="icon"></div>
                            <span class="date">1962</span>
                        </div>
                        <p class="item-content">
                            ليسانس في الأدب الفرنسي ، كلية آداب جامعة القاهرة
                        </p>
                    </div>
                    <div class="education-item">
                        <div class="education-header">
                            <div class="icon"></div>
                            <span class="date">1962</span>
                        </div>
                        <p class="item-content">
                            ليسانس في الأدب الفرنسي ، كلية آداب جامعة القاهرة
                        </p>
                    </div>
                    <div class="education-item">
                        <div class="education-header">
                            <div class="icon"></div>
                            <span class="date">1962</span>
                        </div>
                        <p class="item-content">
                            ليسانس في الأدب الفرنسي ، كلية آداب جامعة القاهرة
                        </p>
                    </div>
                    <div class="education-item">
                        <div class="education-header">
                            <div class="icon"></div>
                            <span class="date">1962</span>
                        </div>
                        <p class="item-content">
                            ليسانس في الأدب الفرنسي ، كلية آداب جامعة القاهرة
                        </p>
                    </div>
              
            </div>
        </section>


        <section class="container work">
            <div class="doc-cv-section-title">
                التدرج الوظيفي
            </div>

            <div class="doc-cv-grid">
                    <div class="work-item">
                        <div class="work-header">
                            <div class="icon"></div>
                            <span class="date">1962</span>
                        </div>
                        <p class="item-content">
                            ليسانس في الأدب الفرنسي ، كلية آداب جامعة القاهرة
                        </p>
                    </div>
                    <div class="work-item">
                        <div class="work-header">
                            <div class="icon"></div>
                            <span class="date">1962</span>
                        </div>
                        <p class="item-content">
                            ليسانس في الأدب الفرنسي ، كلية آداب جامعة القاهرة
                        </p>
                    </div>
                    <div class="work-item">
                        <div class="work-header">
                            <div class="icon"></div>
                            <span class="date">1962</span>
                        </div>
                        <p class="item-content">
                            ليسانس في الأدب الفرنسي ، كلية آداب جامعة القاهرة
                        </p>
                    </div>
                    <div class="work-item">
                        <div class="work-header">
                            <div class="icon"></div>
                            <span class="date">1962</span>
                        </div>
                        <p class="item-content">
                            ليسانس في الأدب الفرنسي ، كلية آداب جامعة القاهرة
                        </p>
                    </div>
              
            </div>
        </section>

        <section class="container membership">
            <div class="doc-cv-section-title">
                عضوية عاملة
            </div>

            <div class="doc-cv-grid">
                    <div class="membership-item">
                        <p class="item-content">
                            لجنة العلوم الاجتماعية  بهيئة الإعجاز العلمي للقرآن و السُنة ، سابقا
                        </p>
                    </div>       
                    <div class="membership-item">
                        <p class="item-content">
                            لجنة العلوم الاجتماعية  بهيئة الإعجاز العلمي للقرآن و السُنة ، سابقا
                        </p>
                    </div>      
                    <div class="membership-item">
                        <p class="item-content">
                            لجنة العلوم الاجتماعية  بهيئة الإعجاز العلمي للقرآن و السُنة ، سابقا
                        </p>
                    </div>      
                    <div class="membership-item">
                        <p class="item-content">
                            لجنة العلوم الاجتماعية  بهيئة الإعجاز العلمي للقرآن و السُنة ، سابقا
                        </p>
                    </div>      
                    <div class="membership-item">
                        <p class="item-content">
                            لجنة العلوم الاجتماعية  بهيئة الإعجاز العلمي للقرآن و السُنة ، سابقا
                        </p>
                    </div>      
                    <div class="membership-item">
                        <p class="item-content">
                            لجنة العلوم الاجتماعية  بهيئة الإعجاز العلمي للقرآن و السُنة ، سابقا
                        </p>
                    </div>      
                    <div class="membership-item">
                        <p class="item-content">
                            لجنة العلوم الاجتماعية  بهيئة الإعجاز العلمي للقرآن و السُنة ، سابقا
                        </p>
                    </div>      
            </div>
        </section>

        {{--<section class="container researches-books">--}}
            {{--<div class="section-header">--}}
                {{--<span class="main-header cv-researches">--}}
                        {{--كتب و ابحاث--}}
                {{--</span>--}}
            {{--</div>--}}

            {{--<div class="researches-books-container">--}}
                {{--<div class="book">--}}
                    {{--<img class="book-img" src="../images/Pantheon-770x433.jpg">--}}
                    {{--<div class="book-desc">--}}
                        {{--<span class="book-title">--}}
                                {{--الإتحاد العالمى لعلماء المسلمين مؤتمر سمات الخطاب الإسلامى--}}
                        {{--</span>--}}
                        {{--<p>٢٤ يناير ٢٠١٩</p>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="book">--}}
                    {{--<img class="book-img" src="../images/Pantheon-770x433.jpg">--}}
                    {{--<div class="book-desc">--}}
                        {{--<span class="book-title">--}}
                                {{--الإتحاد العالمى لعلماء المسلمين مؤتمر سمات الخطاب الإسلامى--}}
                        {{--</span>--}}
                        {{--<p>٢٤ يناير ٢٠١٩</p>--}}
                    {{--</div>--}}
                {{--</div>--}}

            {{--</div>--}}
        {{--</section>--}}

      

    </main>
@endsection
