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

<div class="container-fluid wrapper">

    {{--HEADER TAG--}}
    <header class="top-title col-md-12 padding-left">
        <div class="container">
            @section('header')
            @show
        </div>
    </header>

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