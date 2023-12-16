<section class="font-poppins items-center bg-gray-100 py-14">
    <div class="mx-auto max-w-6xl justify-center px-4 py-4 md:px-6 lg:py-8">
        <div class="mx-auto max-w-xl">
            <div class="text-center">
                <div class="relative flex flex-col items-center">
                    <h1 class="text-6xl font-bold leading-tight text-gray-800">Timeline</h1>
                </div>
                <p class="mb-16 text-center text-base text-gray-500">This section offers visitors a comprehensive overview of the journey your resort undertook from the initial stages of conceptualization to the exciting moment of website launch</p>
            </div>
        </div>
        <div class="mx-auto w-full lg:max-w-3xl">
            @foreach ($timelines as $timeline)
                <div data-aos="fade-up" data-aos-duration="400" class="relative flex justify-between">
                    <div class="mr-4 flex w-10 flex-col items-center md:w-24">
                        <div>
                            <div
                                class="flex h-8 w-8 items-center justify-center rounded-full bg-sky-200">
                                <div class="h-4 w-4 rounded-full bg-sky-600"></div>
                            </div>
                        </div>
                        <div class="h-full w-px bg-sky-300"></div>
                    </div>
                    <div>
                        <h2
                            class="mb-4 inline-block rounded-3xl bg-gradient-to-r from-sky-500 to-sky-600 px-4 py-2 text-sm font-medium text-white">
                            {{ \Carbon\Carbon::parse($timeline->date)->format('F j, Y') }}
                        </h2>
                        <div
                            class="relative mb-10 flex-1 rounded-3xl border-b-4 border-sky-200 bg-white shadow">
                            <div class="relative z-20 p-6">
                                <p class="mb-2 text-xl font-bold text-gray-600 ">{{$timeline->title}}</p>
                                <p class="text-gray-700 ">{{$timeline->description}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
