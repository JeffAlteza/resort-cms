<div class="flex items-center justify-center">
    <div class="text-center px-10 lg:px-36 pt-10">
        <h1 data-aos="fade-up" data-aos-duration="800" class="font-dancing text-5xl md:text-5xl lg:text-7xl text-gray-800">
            Gallery</h1>
        <div class="px-2 lg:px-40">
            <p data-aos="fade-up" data-aos-duration="900" class="text-lg text-gray-600 ">
                From family vacations to romantic getaways, our gallery provides a glimpse into the
                <br> diverse experiences that our resort caters to.
        </div>
    </div>
</div>

<section class="py-10 lg:px-36">
    <div id="carouselExampleCaptions" class="relative" data-te-carousel-init data-te-ride="carousel" data-aos="fade-up"
        data-aos-duration="800">
        <!--Carousel indicators-->
        <div class="absolute bottom-0 left-0 right-0 z-[2] mx-[15%] mb-4 flex list-none justify-center p-0"
            data-te-carousel-indicators>
            @foreach ($galleryPhotos as $index => $galleryPhoto)
                <button type="button" data-te-target="#carouselExampleCaptions" data-te-slide-to="{{ $index }}"
                    {{ $index === 0 ? 'data-te-carousel-active' : '' }}
                    class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
                    aria-current="true" aria-label="Slide 1"></button>
            @endforeach
        </div>

        <!--Carousel items-->
        <div
            class="relative w-[75%] ml-[12%] overflow-hidden after:clear-both after:block after:content-[''] rounded-3xl">
            @foreach ($galleryPhotos as $index => $galleryPhoto)
                <div class="relative float-left -mr-[100%] {{ $index !== 0 ? 'hidden' : '' }} w-full h-[600px] transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none"
                    {{ $index === 0 ? 'data-te-carousel-active' : '' }} data-te-carousel-item 
                    style="backface-visibility: hidden">
                    <img src="{{ asset('storage/' . $galleryPhoto->image) }}" class="object-cover w-full h-[600px]"
                        alt="{{ $galleryPhoto->alt_text }}" />
                    <div class="absolute inset-x-[15%] bottom-5 hidden py-5 text-center text-white md:block">
                        <h5 class="text-xl">{{ $galleryPhoto->title }}</h5>
                        <p>{{ $galleryPhoto->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>


        <!--Carousel controls - prev item-->
        <button
            class="absolute bottom-0 left-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-sky-800 opacity-50 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:opacity-100 hover:no-underline hover:outline-none motion-reduce:transition-none"
            type="button" data-te-target="#carouselExampleCaptions" data-te-slide="prev">
            <span class="inline-block h-8 w-8">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
            </span>
            <span
                class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Previous</span>
        </button>
        <!--Carousel controls - next item-->
        <button
            class="absolute bottom-0 right-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-sky-800 opacity-50 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:opacity-100 hover:no-underline  hover:outline-none motion-reduce:transition-none"
            type="button" data-te-target="#carouselExampleCaptions" data-te-slide="next">
            <span class="inline-block h-8 w-8">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
            </span>
            <span
                class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Next</span>
        </button>
    </div>
    <div class="flex justify-center">
        <a data-aos="fade-up" data-aos-duration="800" href="{{route('gallery')}}"
            class="inline-flex justify-center items-center mt-5 py-2 px-5 text-lg  text-center text-sky-600 rounded-lg bg-white border border-sky-600 hover:bg-sky-600 hover:text-white focus:ring-4 focus:ring-gray-400 ">
            View More
        </a>
    </div>
</section>
