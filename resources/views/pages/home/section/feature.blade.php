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
        <div class="md:w-1/2 p-8 lg:p-12 flex items-center justify-center">
            <img data-aos="fade-up" data-aos-duration="1000" src="{{ asset('storage/' . $featureData->image) }}"
                alt="Feature Image" class="rounded-lg">
        </div>

        <!-- Title and Description Div -->
        <div style="color: #1f1f1f" class="md:w-1/2 flex items-center justify-center">
            <div data-aos="fade-up" data-aos-duration="1000" class="px-12 pt-0 pb-5 md:py-8 lg:p-12">
                <!-- Content in the center of the white div -->
                <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold text-gray-800 mb-5">{{ $featureData->title }}</h1>
                <p class="text-lg md:text-lg lg:text-xl text-gray-600 text-justify">{{ $featureData->description }}</p>
            </div>
        </div>
    </div>
@endforeach
