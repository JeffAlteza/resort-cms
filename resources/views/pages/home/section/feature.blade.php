<div class="flex items-center justify-center">
    <div class="text-center px-10 lg:px-36 pt-10 pb-5">
        <h1 data-aos="fade-up" data-aos-duration="800"
            class="font-dancing text-5xl md:text-5xl lg:text-7xl text-gray-800">
            Feature</h1>
        <div class="px-2 lg:px-40">
            <p data-aos="fade-up" data-aos-duration="900" class="text-lg text-gray-600 ">
                Discover the distinct features that make our resort special, ensuring a memorable experience. <br> Welcome to a tranquil haven designed just for you.</p>
        </div>
    </div>
</div>


@foreach ($featureDatas as $index => $featureData)
    <div class="min-h-4/5 lg:px-48 mb-5 flex flex-col md:flex-row {{ $index % 2 === 0 ? '' : 'md:flex-row-reverse' }}">
        <!-- Image Div -->
        <div
            class="lg:w-1/2 md:w-2/3 p-8 md:px-2 lg:px-0 lg:py-6 flex items-center justify-center transform hover:scale-105 transition-transform duration-500">
            <img data-aos="fade-up" data-aos-duration="800" src="{{ asset('storage/' . $featureData->image) }}"
                alt="Feature Image" class="rounded-3xl shadow-lg">
        </div>

        <!-- Title and Description Div -->
        <div style="color: #1f1f1f" class="lg:w-1/2 md:w-1/3 flex items-center justify-center ">
            <div data-aos="fade-up" data-aos-duration="800" class="px-12 pt-0 pb-5 md:py-8 md:px-2 lg:py-10 lg:px-12">
                <!-- Content in the center of the white div -->
                <div class="flex justify-center md:justify-start lg:justify-start">
                    <h1 class=" text-3xl md:text-4xl lg:text-5xl text-gray-700 mb-2">
                        {{ $featureData->title }}</h1>
                </div>
                <p class="text-lg leading-7 text-gray-600 text-justify indent-14 ">
                    {{ $featureData->description }}</p>
                <div class="flex justify-center md:justify-start lg:justify-start">
                    <a data-aos="fade-up" data-aos-duration="800" href="#next"
                        class="inline-flex justify-center items-center mt-5 py-2 px-5 text-lg  text-center text-green-600 rounded-lg bg-white border border-green-600 hover:bg-green-600 hover:text-white focus:ring-4 focus:ring-gray-400 ">
                        View More
                    </a>
                </div>
            </div>
        </div>
    </div>
@endforeach
