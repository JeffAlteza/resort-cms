@foreach ($featureDatas as $index => $featureData)
    <div class="min-h-4/5 lg:px-48 lg:py-5 flex flex-col md:flex-row">
        <!-- Image Div -->
        <div class="md:w-1/2 p-8 lg:p-12 flex items-center justify-center md:justify-end md:order-1">
            <img data-aos="fade-up" data-aos-duration="1000" src="{{ asset('storage/' . $featureData->image) }}"
                alt="Feature Image" class="rounded-lg">
        </div>

        <!-- Title and Description Div -->
        <div style="color: #1f1f1f" class="md:w-1/2 flex items-center justify-center md:justify-start md:order-2">
            <div data-aos="fade-up" data-aos-duration="1000" class="px-12 pt-0 pb-5 md:py-8 lg:p-12">
                <!-- Content in the center of the white div -->
                <h1 class="text-5xl md:text-6xl lg:text-8xl font-bold text-gray-800 mb-5">{{ $featureData->title }}</h1>
                <p class="text-2xl md:text-lg lg:text-2xl text-gray-600">{{ $featureData->description }}</p>
            </div>
        </div>

    </div>
@endforeach
