<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('components.head')
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="dns-prefetch" href="//unpkg.com" />
    <link rel="dns-prefetch" href="//cdn.jsdelivr.net" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>

    <style>
        [x-cloak] {
            display: none;
        }
    </style>
</head>

<body x-data="{ scrolled: false }" @scroll.window="scrolled = window.scrollY > 0 ? true : false"
    :class="{ 'scrolled': scrolled }">
    <header>
        @include('components.navbar')
    </header>

    <section>
        @include('pages.gallery.section.banner')
    </section>

    <div id="calendar"></div>

    @include('pages.book.component.book-form')
    
    @include('components.faq')

    @include('components.footer3')

    @include('components.script')
</body>

</html>
