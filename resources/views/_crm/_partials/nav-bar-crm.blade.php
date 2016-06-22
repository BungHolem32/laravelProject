{{--*/ $menuTabs = ['return to site', 'user managment', 'page managment']; /*--}}
<div class = "nav-bar-crm-wrapper navbar navbar-default">
    <ul class = "nav-bar-crm-ul navbar navbar-fixed-bottom">
        @foreach($menuTabs as $menu)
            <li class = "nav-bar-crm-li text-capitalize col-md-">{{$menu}}</li>
        @endforeach
    </ul>
</div>