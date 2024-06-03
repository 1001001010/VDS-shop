<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="VDS, servers, hosting, virtual dedicated servers" />
    <meta name="description"
        content="Крупнейший провайдер VDS серверов. Гибкие тарифы, высокая производительность, круглосуточная поддержка." />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="shortcut icon" href="{{ asset('img/fav.svg') }}" type="image/x-icon" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    @include('components.header')
    @yield('content')
    @include('components.footer')
</body>
<script src="{{ asset('js/script.js') }}"></script>
<script>
    let dropdownContent = document.getElementById("dropdown-content");

    document.getElementById("dropdown-toggle").addEventListener("mouseover", dropdownToggle);
    document.getElementById("dropdown-content").addEventListener("mouseout", dropdownOut);

    function dropdownToggle() {
        dropdownContent.classList.add("dropdown-show");
    }

    function dropdownOut() {
        dropdownContent.classList.remove("dropdown-show");
    }
</script>

</html>
