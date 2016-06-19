<!doctype html>
<html lang="en">
<head>

    {{--HEADER --}}
    @include('_layout.pages._head')

    {{--TITLE PAGE--}}
    <title>
        @hasSection('title')
        @yield('title')
        @else
            My App Without Name
        @endif
    </title>

    {{--HEADER DYNAMIC--}}
    @section('head')@show

    {{--TOP SCRIPT--}}
    @stack('top-script')
</head>
<body>
<div class="wrapper container-fluid no-padding">
    {{--HEADER--}}
    <header class="header-part-wrapper container">
        @include('_partials._header')
    </header>


    {{--NAVBAR--}}
    <section class="nav-bar-wrapper ">
        @include('_partials._nav-bar')
    </section>


    {{--CONTENT--}}
    <main class="main-content container">
        <div class="aside-wrapper"></div>

        @section('content')
        @show
    </main>


    {{--FOOTER--}}
    <footer class="footer-part-wrapper container">
        @include('_layout.pages._footer')
    </footer>


    {{--BOTTOM SCRIPT--}}
    @stack('bottom-script')
</div>
</body>
</html>