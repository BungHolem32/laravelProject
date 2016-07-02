<!doctype html>
<html lang="en">
<head>

    {{--HEADER --}}
    @include('production.layout._head')

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

{{--REVEAL THE PAGE ROUTE AND ADD IT TO THE CONTAINER CLASS--}}
{{--*/ $page = \Illuminate\Support\Facades\Request::path(); /*--}}

<div class="wrapper container-fluid no-padding {{$page}}-page">
    {{--HEADER--}}
    <header class="header-part-wrapper container">
        @include('production._partials._header')
    </header>


    {{--NAVBAR--}}
    <section class="nav-bar-wrapper ">
        @include('production._partials._nav-bar')
    </section>


    {{--CONTENT--}}
    <main class="main-content container">
        <div class="aside-wrapper"></div>

        @section('content')
        @show
    </main>


    {{--FOOTER--}}
    <footer class="footer-part-wrapper container">
        @include('production.layout._footer')
    </footer>


    {{--BOTTOM SCRIPT--}}
    @stack('bottom-script')
</div>
</body>
</html>