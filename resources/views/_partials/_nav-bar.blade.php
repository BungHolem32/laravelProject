<nav class="nav-bar-tag container">
    <ul class="nav-bar-ul-element list-inline text-capitalize">
        @foreach($urls as $url)
            <li class="nav-bar-li-element col-xs-2 text-center"><a href="{{$url}}">{{$url}}</a></li>
        @endforeach
    </ul>
</nav>

