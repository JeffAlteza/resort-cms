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

    <section class="mb-4">
        @include('pages.gallery.section.banner')
    </section>

    @include('pages.home.section.about-us2')

    @include('pages.about-us.section.timeline')

    <section>
        @include('pages.home.section.location')
    </section>
    
    <section>
        @include('components.book-now')
    </section>
    

    @include('components.footer3')

    @include('components.script')
</body>

</html>
