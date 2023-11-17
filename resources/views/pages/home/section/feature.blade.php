<div class="min-h-5/6 flex items-center justify-center">
    <div class="text-center px-36 pt-10">
        <h1 data-aos="fade-up" data-aos-duration="1000"
            class="font-serif text-4xl md:text-5xl lg:text-7xl font-bold text-gray-800 mb-5">
            Feature</h1>
        <div class="px-2 lg:px-40">
            <p data-aos="fade-up" data-aos-duration="1100" class="text-lg md:text-lg lg:text-xl text-gray-700">

                Discover the distinct features that make our resort special, ensuring a memorable experience of comfort
                and peace. <br> Welcome to a tranquil haven designed just for you.</p>
        </div>
        {{-- <a data-aos="fade-up" data-aos-duration="1200" href="#next"
            class="inline-flex justify-center items-center mt-5 py-2 px-9 text-lg font-semibold text-center text-white rounded-full bg-green-600 border border-green-600 hover:bg-green-700 focus:ring-4 focus:ring-gray-400">
            About us
        </a> --}}
    </div>
</div>


@foreach ($featureDatas as $index => $featureData)
    <div
        class="min-h-4/5 lg:px-48 flex flex-col md:flex-row {{ $index % 2 === 0 ? '' : 'md:flex-row-reverse' }}">
        <!-- Image Div -->
        <div
            class="md:w-2/3 p-8 lg:p-12 flex items-center justify-center transform hover:scale-105 transition-transform duration-500">
            <img data-aos="fade-up" data-aos-duration="1000" src="{{ asset('storage/' . $featureData->image) }}"
                alt="Feature Image" class="rounded-lg shadow-lg">
        </div>

        <!-- Title and Description Div -->
        <div style="color: #1f1f1f" class="md:w-1/3 flex items-center justify-center">
            <div data-aos="fade-up" data-aos-duration="1000" class="px-12 pt-0 pb-5 md:py-8 lg:p-12">
                <!-- Content in the center of the white div -->
                <div class="flex justify-center md:justify-start lg:justify-start">
                    <h1 class="font-serif text-4xl md:text-5xl lg:text-7xl font-bold text-gray-800 mb-5">
                        {{ $featureData->title }}</h1>
                </div>
                <p class="text-lg md:text-lg lg:text-xl text-gray-700 text-justify indent-14">
                    {{ $featureData->description }}</p>
                <div class="flex justify-center md:justify-start lg:justify-start">

                    <a href="#next"
                        class="inline-flex justify-center items-center mt-5 py-2 px-9 text-lg font-semibold text-center text-white rounded-full bg-green-600 border border-green-600 hover:bg-green-700 focus:ring-4 focus:ring-gray-400 shadow">
                        View More
                    </a>
                </div>
            </div>
        </div>
    </div>
@endforeach
