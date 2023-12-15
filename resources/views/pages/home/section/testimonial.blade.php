<div class="min-h-5/6 flex items-center justify-center pb-20 bg-slate-100">
    <div class="text-center px-10 lg:px-36 pt-10">
        <h1 data-aos="fade-up" data-aos-duration="800" class="font-dancing text-5xl md:text-5xl lg:text-7xl text-gray-800">
            Feedback</h1>
        <div class="px-2 lg:px-40">
            <p data-aos="fade-up" data-aos-duration="900" class="text-lg text-gray-600">
                Discover the distinct features that make our resort special, ensuring a memorable experience. <br>
                Welcome to a tranquil haven designed just for you.</p>
        </div>
    </div>
</div>
<section class="flex items-center bg-slate-100 dark:bg-gray-800 lg:h-4/5">
    <div class="mx-auto max-w-7xl p-4">
        <div class="flex">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-4 lg:grid-cols-3 lg:gap-4">
                @foreach ($feedbacks as $feedback)
                    <a data-aos="fade" data-aos-duration="900"
                        class="relative mb-20 rounded-2xl bg-white text-center shadow dark:bg-gray-700">
                        <div class="z-20 -mt-24 p-8">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                class="absolute left-4 top-4 h-20 w-20 opacity-10" viewBox="0 0 16 16">
                                <path
                                    d="M12 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1h-1.388c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 9 7.558V11a1 1 0 0 0 1 1h2Zm-6 0a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1H4.612c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 3 7.558V11a1 1 0 0 0 1 1h2Z" />
                            </svg>
                            <div
                                class="mb-3 inline-block h-32 w-32 overflow-hidden rounded-full bg-blue-500 text-xs text-white">
                                <img class="h-full w-full object-cover transition-all hover:scale-110"
                                    src="{{ asset('storage/' . $feedback->image) }}" alt="" />
                            </div>
                            <p class="mb-4 text-base leading-7 text-gray-700">{{ $feedback->feedback }}</p>
                            <h2 class="text-lg font-bold leading-9 text-black dark:text-white font">
                                {{ $feedback->name }}</h2>
                            <span
                                class="block text-xs font-semibold uppercase text-green-600 dark:text-green-600">{{ $feedback->address }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                class="absolute bottom-4 right-4 h-20 w-20 rotate-180 opacity-10" viewBox="0 0 16 16">
                                <path
                                    d="M12 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1h-1.388c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 9 7.558V11a1 1 0 0 0 1 1h2Zm-6 0a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1H4.612c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 3 7.558V11a1 1 0 0 0 1 1h2Z" />
                            </svg>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</section>
