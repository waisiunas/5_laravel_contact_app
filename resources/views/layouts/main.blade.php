<!DOCTYPE html>
<html lang="en">


@include('partials.head')

<body>
    <div class="wrapper">
        @include('partials.sidebar')

        <div class="main">
            @include('partials.topbar')

            @yield('content')

            @include('partials.footer')
        </div>
    </div>

    <script src="{{ asset('template/js/app.js') }}"></script>

</body>

</html>
