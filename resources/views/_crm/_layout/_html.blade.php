<!doctype html>
<html lang="en">
<head>
    @include('_crm._layout._head')
    <title>
        @yield('title')
    </title>
    @include('_crm._layout._top-script')
    @stack('top-script')
</head>
<body>

<div class="container-fluid wrapper no-padding">

    {{--HEADER TAG--}}
    <header class="top-title col-md-12">
        <div class="container text-center">
            @section('header')
            @show
        </div>
    </header>
    <div class="clearfix"></div>

    {{--NAV BAR TAG--}}
    @yield('nav-bar')

    {{--MAIN CONTENT --}}
    <main class="cms-content ">
        @yield('content')
    </main>

    {{--FOOTER TAG--}}
    <footer class="cms-footer ">
        @section('footer')
        @show
    </footer>
</div>
{{--BOTTOM SCRIPT--}}
@include('_crm._layout._bottom-script')
@stack('bottom-scripts')
</body>
</html>