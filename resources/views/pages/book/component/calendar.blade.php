<div x-data="app()" x-init="[initDate(), getNoOfDays()]" x-cloak>
    <div class="bg-white rounded-lg shadow overflow-hidden sans-serif">
        <div class="flex items-center justify-between py-2 px-6">
            <div>
                <span x-text="MONTH_NAMES[month % 12]" class="text-lg font-bold text-gray-800"></span>
                <span x-text="year + Math.floor(month / 12)" class="ml-1 text-lg text-gray-600 font-normal"></span>
            </div>
            <div class="border rounded-lg px-1" style="padding-top: 2px;">
                <button type="button"
                    class="leading-none rounded-lg transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-200 p-1 items-center"
                    @click="month--; getNoOfDays()">
                    <svg class="h-6 w-6 text-gray-500 inline-flex leading-none" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <div class="border-r inline-flex h-6"></div>
                <button type="button"
                    class="leading-none rounded-lg transition ease-in-out duration-100 inline-flex items-center cursor-pointer hover:bg-gray-200 p-1"
                    @click="month++; getNoOfDays()">
                    <svg class="h-6 w-6 text-gray-500 inline-flex leading-none" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
        </div>


        <div class="-mx-1 -mb-1" style="display: grid; grid-template-columns: repeat(7, 1fr); grid-gap: 0px;">
            <template x-for="(day, index) in DAYS" :key="index">
                <div style="height: 40px" class="px-2 py-2 border text-gray-600 text-xs uppercase tracking-wide font-bold text-center">
                    <div x-text="day"></div>
                </div>
            </template>
        
            <template x-for="blankday in blankdays">
                <div style="height: 70px" class="text-center border px-4 py-2"></div>
            </template>
        
            <template x-for="(date, dateIndex) in no_of_days" :key="dateIndex">
                <div style="height: 70px" class="px-4 py-2 border relative">
                    <div @click="showEventModal(date)" x-text="date"
                        class="inline-flex w-6 h-6 items-center justify-center cursor-pointer text-center leading-none rounded-full transition ease-in-out duration-100"
                        :class="{
                            'bg-blue-500 text-white': isToday(date) == true,
                            'text-gray-800 hover:bg-blue-200': isToday(date) == false
                        }">
                    </div>
                </div>
            </template>
        </div>
        
    </div>
</div>