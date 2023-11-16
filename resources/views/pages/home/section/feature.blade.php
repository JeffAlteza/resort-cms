{{-- <div class="min-h-4/5 lg:px-48 lg:py-5 flex flex-col items-center justify-center ">
    <h1 class="mb-5 text-5xl font-bold text-gray-800 md:text-6xl lg:text-7xl">Features</h1>
    <p class="text-center text-md text-gray-600 md:text-lg lg:text-lg">Discover unparalleled luxury and versatility at
        our resort and events venue, where scenic beauty meets state-of-the-art facilities, creating unforgettable
        experiences for both relaxation and celebrations.</p>
</div> --}}

@foreach ($featureDatas as $index => $featureData)
    <div
        class="min-h-4/5 lg:px-48 lg:py-5 flex flex-col md:flex-row {{ $index % 2 === 0 ? '' : 'md:flex-row-reverse' }}">
        <!-- Image Div -->
        <div class="md:w-2/3 p-8 lg:p-12 flex items-center justify-center transform hover:scale-105 transition-transform duration-500">
            <img data-aos="fade-up" data-aos-duration="1000" src="{{ asset('storage/' . $featureData->image) }}"
                alt="Feature Image" class="rounded-lg">
        </div>        

        <!-- Title and Description Div -->
        <div style="color: #1f1f1f" class="md:w-1/3 flex items-center justify-center">
            <div data-aos="fade-up" data-aos-duration="1000" class="px-12 pt-0 pb-5 md:py-8 lg:p-12">
                <!-- Content in the center of the white div -->
                <div class="flex justify-center md:justify-start lg:justify-start">
                    <h1 class="font-serif text-4xl md:text-5xl lg:text-7xl font-bold text-gray-800 mb-5">
                        {{ $featureData->title }}</h1>
                </div>
                <p class="text-lg md:text-lg lg:text-xl text-gray-600 text-justify indent-14">
                    {{ $featureData->description }}</p>
                <div class="flex justify-center md:justify-start lg:justify-start">

                    <a href="#next"
                        class="inline-flex justify-center items-center mt-5 py-2 px-4 text-lg font-medium text-center text-white rounded-lg bg-green-600 border border-green-600 hover:bg-green-700 focus:ring-4 focus:ring-gray-400">
                        View More
                    </a>
                </div>
            </div>
        </div>
    </div>
@endforeach
