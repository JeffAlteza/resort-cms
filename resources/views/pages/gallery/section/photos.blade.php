
<section id="next" class="font-poppins flex items-center bg-white pb-16 pt-5 dark:bg-gray-800">
    <div class="mx-auto max-w-6xl p-4">

        <div class="-m-1 flex flex-wrap md:-m-2">
            @foreach ($galleryPhotos as $index => $galleryPhoto)
                <!-- Determine whether the index is even or odd -->
                @php $isEven = $index % 2 === 0; @endphp
        
                <!-- Determine the width based on the pattern -->
                @php
                    $width = $isEven ? ($index % 4 === 0 ? '3/5' : '2/5') : ($index % 4 === 3 ? '3/5' : '2/5');
                    $fade = $isEven ? "fade-right" : "fade-left"
                @endphp
        
                <!-- Card with alternating sizes -->
                <div class="mb-4 w-full px-2 lg:w-{{ $width }}">
                    <div data-aos="{{ $fade }}" data-aos-duration="800" class="group relative overflow-hidden rounded-2xl shadow-lg">
                        <img src="{{ asset('storage/' . $galleryPhoto->image) }}"
                            class="inset-0 h-[350px] w-full object-cover object-center transition duration-500 group-hover:origin-center group-hover:scale-105"
                            alt="" />
                        <div class="absolute inset-0 z-0 opacity-60 group-hover:bg-gray-900"></div>
                        <div class="content absolute bottom-4 left-4 right-4 hidden p-4 text-center group-hover:block">
                            <a href="#" class="mb-2 text-2xl font-semibold text-gray-100 dark:text-white">{{ $galleryPhoto->title }}</a>
                            <h2 class="mb-0 text-sm font-light text-gray-300 dark:text-gray-300">{{ $galleryPhoto->description }}</h2>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        

    </div>
</section>
