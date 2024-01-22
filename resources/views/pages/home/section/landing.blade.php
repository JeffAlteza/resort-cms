<style>
    @keyframes bounce {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-1rem);
        }
    }
</style>

<section style="background-image: url('{{ asset('storage/' . $banner['image']) }}');"
    class="h-screen max-w-screen bg-center bg-no-repeat bg-cover bg-gray-700 flex items-center justify-center mx-auto">
    <div class="flex-col text-center text-white justify-center">
        <h1 data-aos="fade-up" data-aos-duration="1300" style="text-shadow: 2px 2px 4px rgb(40, 40, 40);"
            class="mb-3 text-6xl tracking-tight leading-none md:text-7xl lg:text-9xl font-montecarlo">
            {{ $banner['title'] }}
        </h1>

        <p data-aos="fade-up" data-aos-duration="1600" style="text-shadow: 1px 1px 2px rgb(70, 70, 70);"
            class="mb-8 text-lg font-normal lg:text-xl sm:px-16 lg:px-48">{{ $banner['description'] }}</p>

        <a href="{{ route('book') }}" data-aos="fade-up" data-aos-duration="1700"
            class="hover:text-gray-900 items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg border border-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-400">
            Book Now
        </a>
        {{-- <div class="flex items-center justify-center animate-bounce">
            <a href="#next" class="text-white flex-col items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1"
                    stroke="currentColor" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m9 12.75 3 3m0 0 3-3m-3 3v-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </a>
        </div> --}}
    </div>
</section>
