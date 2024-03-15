<div class="h-[500px] py-10 lg:px-36 relative">
    <div class="bg-cover bg-center bg-fixed bg-no-repeat absolute inset-0"
        style="background-image: url('{{ asset('storage/'.$banner['image']) }}');"></div>
    <div class="flex flex-col items-center justify-center h-full relative z-10">
        <h1 class="text-white text-6xl  md:text-7xl lg:text-8xl mb-5 font-dancing" data-aos="fade" data-aos-duration="800"
            style="text-shadow: 1px 1px 2px rgb(100, 100, 100);">
            {{$banner['title']}}
        </h1>
        <p data-aos="fade-up" data-aos-duration="1600"  style="text-shadow: 1px 1px 2px rgb(100, 100, 100);" class="text-center text-white mb-8 text-lg font-normal lg:text-xl sm:px-16 lg:px-48">
            {{$banner['description']}}
        </p>
        {{-- <a href="#next" data-aos="fade-up" data-aos-duration="1700" class="inline-flex justify-center hover:text-gray-900 items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg border border-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-400">
            Explore
        </a> --}}
    </div>
</div>
