{{--*/ $menuTabs = [ 'user-management', 'page-management','cms-managment','return to site']; /*--}}
<nav class="navbar   cms-navigation">
    <ul class="container">
        @foreach($menuTabs as $menu)
            <li class="nav-bar-crm-li text-uppercase nav-item text-center col-xs-3 list-unstyled">
                @if($menu == 'return to site' )
                    <a class="nav-link" href="/">{{$menu}}</a>
                @else
                    <a class="nav-link" href="/cms/{{$menu}}">{{str_replace('-',' ',$menu)}}</a>
                @endif
            </li>
        @endforeach
    </ul>
</nav>
