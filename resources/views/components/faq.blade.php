<section class=" bg-slate-100 py-24">
    <div class="container  mx-auto md:px-6 xl:px-40">
        <h2 class="mb-6 pl-6 text-3xl font-bold">Frequently asked questions</h2>

        <!-- TW Elements is free under AGPL, with commercial license required for specific uses. See more details: https://tw-elements.com/license/ and contact us for queries at tailwind@mdbootstrap.com -->
        <div id="accordionExample">
            @foreach ($faq as $index => $item)
                <div
                    class="border border-neutral-200 bg-white
                        @if ($index === 0) rounded-t-lg @elseif($index === count($faq) - 1) rounded-b-lg border-t-0 @else border-t-0 @endif">
                    <h2 class="mb-0" id="heading{{ $index }}">
                        <button
                            class="group relative flex w-full items-center rounded-t-[15px] border-0 bg-white px-5 py-4 text-left text-base text-neutral-800 transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none [&:not([data-te-collapse-collapsed])]:bg-white [&:not([data-te-collapse-collapsed])]:text-primary [&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(229,231,235)]"
                            type="button" data-te-collapse-init data-te-target="#collapse{{ $index }}"
                            aria-expanded="false" aria-controls="collapse{{ $index }}">
                            • {{ $item->question }}
                            <span
                                class="ml-auto h-5 w-5 shrink-0 rotate-[-180deg] fill-[#292a2c] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                            </span>
                        </button>
                    </h2>
                    <div id="collapse{{ $index }}" class="!visible hidden" data-te-collapse-item
                        aria-labelledby="heading{{ $index }}" data-te-parent="#accordionExample">
                        <div class="px-5 py-4 text-gray-700">
                            <p class="pl-4">{{ $item->answer }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>
