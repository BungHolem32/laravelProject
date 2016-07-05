{{--*/ $menuTabs = [ 'user-management', 'page-management','cms-managment','return to site']; /*--}}
<nav class="navbar nav-bar-cms">
    <ul class="container">
        @foreach($menuTabs as $menu)
            <li class="nav-bar-crm-li text-uppercase nav-item  col-xs-12 col-sm-6 col-md-3 list-unstyled no-padding-left">
                @if($menu == 'return to site' )
                    <a class="nav-link" href="/">{{$menu}}</a>
                @else
                    <a class="nav-link" href="/cms/{{$menu}}">{{str_replace('-',' ',$menu)}}</a>
                @endif
            </li>
        @endforeach
    </ul>
</nav>