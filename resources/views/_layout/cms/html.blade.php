<!doctype html>
<html lang="en">
<head>
    @include('_layout.cms.head')
    @include('_layout.cms._top-script')
    @stack('top-script')
</head>
<body>
<header class="top-title">

</header>

<nav class="cms-navigation">
    @include('_partials._nav-bar')
</nav>

<main class="cms-content">
    @yield('content')
</main>
<footer class="cms-footer">
    @section('footer')
    @show
</footer>

@include('_layout.cms._bottom-script')
@stack('bottom-scripts')
</body>
</html>