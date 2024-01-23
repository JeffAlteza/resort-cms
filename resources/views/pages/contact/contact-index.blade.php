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
        @include('pages.gallery.section.banner')
    </section>
    
    @include('components.modal')
    
    @include('pages.contact.section.contacts')
    
    @include('components.faq')

    <section>
        @include('components.book-now')
    </section>

    @include('components.footer3')

    @include('components.script')
</body>

</html>
