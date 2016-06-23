<!doctype html>
<html lang = "en">
<head>
    @include('_cms._layout._head')

    @section('title')@show
    @include('_cms._layout._top-script')
    @stack('top-script')
</head>
<body>

<div class = "container-fluid">

    <header class = "top-title col-md-6 padding-left container">
        @section('header') @show
    </header>

    {{--NAV BAR TAG--}}
    <nav class = "cms-navigation uk-navbar">
        @include('_cms._partials.nav-bar-crm')
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
</div>
{{--BOTTOM SCRIPT--}}
@include('_cms._layout._bottom-script')
@stack('bottom-scripts')
</body>
</html>