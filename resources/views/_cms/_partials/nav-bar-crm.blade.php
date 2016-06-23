{{--*/ $menuTabs = ['return to site', 'user managment', 'page managment']; /*--}}

<div class="uk-navbar uk-center">
    <ul class = "nav-bar-crm-ul  uk-navbar-nav">
        @foreach($menuTabs as $menu)
            <li class = "nav-bar-crm-li text-capitalize uk-parent "><a href="">{{$menu}}</a></li>
        @endforeach
    </ul>
</div>

