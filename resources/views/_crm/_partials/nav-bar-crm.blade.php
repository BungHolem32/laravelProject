{{--*/ $menuTabs = ['return to site', 'user managment', 'page managment']; /*--}}
<nav class="navbar navbar-light  cms-navigation">
    <a class="navbar-brand" href="#">Navbar</a>
    <ul class="nav navbar-nav nav-bar-crm-ul">
        @foreach($menuTabs as $menu)
            <li class = "nav-bar-crm-li text-capitalize nav-item">
                <a class="nav-link" href="#">Home <span class="sr-only">{{$menu}}</span></a>
            </li>
        @endforeach
    </ul>
    <form class="form-inline pull-xs-right">
        <input class="form-control" type="text" placeholder="Search">
        <button class="btn btn-success-outline" type="submit">Search</button>
    </form>
</nav>
