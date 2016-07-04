<!doctype html>
<html lang="en">
<head>
    @include('cms.layout._head')
    <title>
        @yield('title')
    </title>
    @include('cms.layout._top-script')
    @stack('top-scripts')
</head>
<body>

{{--REVEAL THE PAGE ROUTE AND ADD IT TO THE CONTAINER CLASS--}}
{{--*/ $page = getUrlLastSlug(\Illuminate\Support\Facades\Request::path()) /*--}}

<div class="container-fluid wrapper no-padding {{$page}}-page">

    {{--HEADER TAG--}}
    <header class="top-title-unconnect">
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
@include('cms.layout._bottom-script')
@section('bottom-scripts')
@show
</body>
</html>