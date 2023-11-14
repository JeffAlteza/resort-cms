@foreach ($featureDatas as $index => $featureData)
    <div class="min-h-4/5 w-screen flex px-10 py-5">
        <!-- Left Div -->
        <div class="p-12 flex-1 flex items-center justify-end md:justify-center">
            <img data-aos="fade-up" data-aos-duration="1000" src="{{ asset('storage/' . $featureData->image) }}"
                alt="Feature Image" class="rounded-lg h-auto">
        </div>

        <!-- Right Div -->
        <div style="color: #1f1f1f" class="flex-1 flex items-center justify-center md:justify-start">
            <div data-aos="fade-up" data-aos-duration="1000" class="p-12 md:p-8">
                <!-- Content in the center of the white div -->
                <h1 class="text-5xl md:text-4xl font-bold text-gray-800 mb-5">{{ $featureData->title }}</h1>
                <p class="text-base md:text-lg text-gray-600">{{ $featureData->description }}</p>
            </div>
        </div>

        {{-- Swap left and right divs for even feature indices --}}
        @if ($index % 2 == 0)
            <style>
                .flex-1:first-child {
                    order: 1;
                }

                .flex-1:last-child {
                    order: 2;
                }
            </style>
        @endif
    </div>
@endforeach
