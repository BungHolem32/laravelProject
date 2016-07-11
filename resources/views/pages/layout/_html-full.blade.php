<!doctype html>
<html lang="en">
<head>
    @yield('head')
    <title>@section('title')@show</title>
</head>
<body>
<div class="container-fluid">
    <header>
        @yield('header')
    </header>
    <main>
        @yield('body-content')
    </main>
    <footer class="footer">
        @yield('footer')
    </footer>
</div>
</body>
</html>