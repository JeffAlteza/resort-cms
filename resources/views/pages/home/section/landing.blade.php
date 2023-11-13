<section style="background-image: url('{{ asset('storage/'.$homeData['image']) }}');" class="h-screen w-screen bg-center bg-no-repeat bg-cover bg-gray-700 flex items-center justify-center">
    <div class="text-center text-white" >
        <h1 data-aos="fade-up" data-aos-duration="1300" style="text-shadow: 2px 2px 4px rgb(78, 78, 78); font-family: 'DM Serif Text', serif"  class="mb-3 text-6xl font-extrabold tracking-tight leading-none md:text-7xl lg:text-8xl">
            {{ $homeData['title'] }}
        </h1>

        <p data-aos="fade-up" data-aos-duration="1600"  style="text-shadow: 1px 1px 2px rgb(100, 100, 100);" class="mb-8 text-lg font-normal lg:text-xl sm:px-16 lg:px-48">{{ $homeData['description'] }}</p>

        <a href="#" data-aos="fade-up" data-aos-duration="1700" class="inline-flex justify-center hover:text-gray-900 items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg border border-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-400">
            Learn More
        </a>  
    </div>
</section>

