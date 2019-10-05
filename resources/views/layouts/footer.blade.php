<footer>

    <nav class="navigation footer-nav">
        <ul class="container navigation-list has-white-background">
            <li class="navigation-list-item ">
                <a href="{{route('home')}}">
                    <img src="{{asset('storage/name.png')}}">
                </a>
            </li>
            <?php
            $visitors = App\Models\Visitors::first();
            $count = $visitors->number;
            ?>
            <li style="width: 148px;height: 16px;font-family: Tajawal;font-size: 16px;font-weight: normal;
                    font-style: normal;font-stretch: normal;line-height: normal;letter-spacing: normal;text-align: right;
                     color: #8591b0;  font-weight: bold;color: #545b6d;">
                           عدد زيارات الموقع  {{$count}}
            </li>


        </ul>
    </nav>

</footer>