<!doctype html>
<html lang = "en">
<head>
    @include('_crm._layout._head')
    @include('_crm._layout._top-script')
    @stack('top-script')
</head>
<body>
<header class = "top-title col-md-6 padding-left">
    @section('header') @show
</header>

{{--NAV BAR TAG--}}
<nav class = "cms-navigation">
    @section('nav-bar') @show
</nav>

{{--MAIN CONTENT --}}
<main class = "cms-content">
    @yield('content')
</main>

{{--FOOTER TAG--}}
<footer class = "cms-footer">
    @section('footer')
    @show
</footer>

{{--BOTTOM SCRIPT--}}
@include('_crm._layout._bottom-script')
@stack('bottom-scripts')
</body>
</html>