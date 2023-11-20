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

    <section id="next">
        @include('pages.home.section.about-us')
    </section>

    <section>
        @include('pages.home.section.cards')
    </section>

    <section>
        @include('pages.home.section.feature')
    </section>

    <section>
        @include('pages.home.section.youtube')
    </section>

    <section class="bg-green-900">
        @include('components.footer')
    </section>

    @include('components.script')
</body>

</html>
