<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
    AOS.init();
</script>

<script>
    window.addEventListener("scroll", function() {
        var navbar = document.getElementById("navbar");
        if (window.scrollY > 0) {
            navbar.classList.add("scrolled");
        } else {
            navbar.classList.remove("scrolled");
        }
    });
</script>
<script>
    function toggleMenu() {
        var navbar = document.getElementById("navbar");
        navbar.classList.toggle("mobile-menu-open");
    }
</script>

<script type="text/javascript" src="../node_modules/tw-elements/dist/js/tw-elements.umd.min.js"></script>

{{-- Calendar script --}}
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