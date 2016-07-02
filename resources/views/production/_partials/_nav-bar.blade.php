<nav class="nav-bar-tag container">
    <ul class="nav-bar-ul-element list-inline text-capitalize">
        @foreach($urlList as $url)
            <li class="nav-bar-li-element col-xs-2 text-center text-uppercase"><a href="{{url($url)}}">{{$url}}</a></li>
        @endforeach
    </ul>
</nav>

