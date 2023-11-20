<section id="next" class="flex items-center py-20 bg-white xl:h-5/6 font-poppins dark:bg-gray-800">
    <div class="justify-center flex-1 max-w-7xl py-4 mx-auto lg:py-6 md:px-6">
        <div class="flex flex-wrap">
            <div data-aos="fade-up" data-aos-duration="1000" class="w-full lg:w-3/5 px-4 mb-10 lg:mb-0">
                <div class="relative">
                    <img src="{{ asset('storage/' . $aboutUs->image) }}" alt="About Us Image"
                        class="relative z-40 object-cover w-full h-3/4 lg:rounded-tr-[80px] lg:rounded-bl-[80px] rounded">
                    <div
                        class="absolute z-10 hidden w-full h-full bg-green-600 rounded-bl-[80px] rounded -bottom-6 right-6 lg:block">
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-2/5 px-4">
                <div data-aos="fade-up" data-aos-duration="1000" class="relative">
                    <h1 class="text-3xl font-serif font-bold md:text-5xl dark:text-white">
                        {{ $aboutUs->title }}
                    </h1>
                </div>
                <p data-aos="fade-up" data-aos-duration="1100"
                    class="mt-6 mb-2 text-lg leading-7 text-gray-600 dark:text-gray-400 text-justify indent-14">
                    {{ $aboutUs->description }}
                </p>
                <a data-aos="fade-up" data-aos-duration="1100" href="#next"
                    class="inline-flex justify-center items-center mt-2 py-2 px-4 text-md  text-center text-green-600 rounded-full bg-white border border-green-600 hover:bg-green-600 hover:text-white focus:ring-4 focus:ring-gray-400 ">
                    About Us
                </a>
            </div>
        </div>
    </div>
</section>
