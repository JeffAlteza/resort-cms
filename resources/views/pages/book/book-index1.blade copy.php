<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Calendar</title>
    <link rel="dns-prefetch" href="//unpkg.com" />
    <link rel="dns-prefetch" href="//cdn.jsdelivr.net" />
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>

    <style>
        [x-cloak] {
            display: none;
        }
    </style>
</head>

<body class="bg-gray-200 p-4">
    <!-- This is an example component -->

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


            <div class="-mx-1 -mb-1">
                <div class="flex flex-wrap" style="margin-bottom: -40px;">
                    <template x-for="(day, index) in DAYS" :key="index">
                        <div style="width: 14.26%" class="px-2 py-2">
                            <div x-text="day"
                                class="text-gray-600 text-sm uppercase tracking-wide font-bold text-center">
                            </div>
                        </div>
                    </template>
                </div>

                <div class="flex flex-wrap border-t border-l">
                    <template x-for="blankday in blankdays">
                        <div style="width: 14.28%; height: 100px" class="text-center border-r border-b px-4 pt-2"></div>
                    </template>
                    <template x-for="(date, dateIndex) in no_of_days" :key="dateIndex">
                        <div style="width: 14.28%; height: 100px" class="px-4 pt-2 border-r border-b relative">
                            <div @click="showEventModal(date)" x-text="date"
                                class="inline-flex w-6 h-6 items-center justify-center cursor-pointer text-center leading-none rounded-full transition ease-in-out duration-100"
                                :class="{
                                    'bg-blue-500 text-white': isToday(date) ==
                                        true,
                                    'text-gray-700 hover:bg-blue-200': isToday(date) == false
                                }">
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>

    <script>
        const MONTH_NAMES = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
            'October', 'November', 'December'
        ];
        const DAYS = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

        function app() {
            return {
                month: '',
                year: '',
                no_of_days: [],
                blankdays: [],
                days: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],

                events: [{
                        event_date: new Date(2020, 3, 1),
                        event_title: "April Fool's Day",
                        event_theme: 'blue'
                    },

                    {
                        event_date: new Date(2020, 3, 10),
                        event_title: "Birthday",
                        event_theme: 'red'
                    },

                    {
                        event_date: new Date(2020, 3, 16),
                        event_title: "Upcoming Event",
                        event_theme: 'green'
                    }
                ],
                event_title: '',
                event_date: '',
                event_theme: 'blue',

                themes: [{
                        value: "blue",
                        label: "Blue Theme"
                    },
                    {
                        value: "red",
                        label: "Red Theme"
                    },
                    {
                        value: "yellow",
                        label: "Yellow Theme"
                    },
                    {
                        value: "green",
                        label: "Green Theme"
                    },
                    {
                        value: "purple",
                        label: "Purple Theme"
                    }
                ],

                initDate() {
                    let today = new Date();
                    this.month = today.getMonth();
                    this.year = today.getFullYear();
                    this.datepickerValue = new Date(this.year, this.month, today.getDate()).toDateString();
                    this.getNoOfDays(); // Call getNoOfDays after updating the month
                },

                isToday(date) {
                    const today = new Date();
                    const d = new Date(this.year, this.month, date);

                    return today.toDateString() === d.toDateString() ? true : false;
                },

                // showEventModal(date) {
                //     // You can modify this function if you want to add any other functionality
                // },

                getNoOfDays() {
                    let daysInMonth = new Date(this.year, this.month + 1, 0).getDate();

                    // find where to start calendar day of the week
                    let dayOfWeek = new Date(this.year, this.month, 1).getDay();
                    let blankdaysArray = [];

                    // Handle transition to the next year
                    if (this.month === 0) {
                        dayOfWeek = (dayOfWeek + 6) % 7;
                    }

                    for (let i = 1; i <= dayOfWeek; i++) {
                        blankdaysArray.push(i);
                    }

                    let daysArray = [];
                    for (let i = 1; i <= daysInMonth; i++) {
                        daysArray.push(i);
                    }

                    this.blankdays = blankdaysArray;
                    this.no_of_days = daysArray;
                }

            }
        }
    </script>
</body>

</html>
