<div class="navbar" id="navbar">
    <div class="max-w-screen-xl mx-auto flex justify-between items-center p-3"
        style="text-shadow: 0.5px 0.5px 0.5px rgb(150, 150, 150);">
        <a href="#" class="font-serif text-2xl font-semibold tracking-widest text-white uppercase">{{ env('APP_NAME') }}</a>
        <div class="menu-icon" onclick="toggleMenu()">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
        <nav class="flex" id="nav-links">
            <a href="#" class="px-4 py-2 mt-2 text-md bg-transparent rounded-lg">Blog</a>
            <a href="#" class="px-4 py-2 mt-2 text-md bg-transparent rounded-lg">Feature</a>
            <a href="#" class="px-4 py-2 mt-2 text-md bg-transparent rounded-lg">About Us</a>
            <a href="#" class="px-4 py-2 mt-2 text-md bg-transparent rounded-lg">Contact</a>
        </nav>
    </div>
</div>
