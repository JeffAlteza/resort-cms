<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('components.head')
</head>

<body x-data="{ scrolled: false }" @scroll.window="scrolled = window.scrollY > 0 ? true : false"
    :class="{ 'scrolled': scrolled }">
    <header>
        @include('components.navbar')
    </header>

    <section>
        @include('pages.home.section.landing')
    </section>

    @include('components.script')
</body>

</html>
