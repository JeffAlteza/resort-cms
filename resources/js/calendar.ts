import VanillaCalendar, { Options } from 'vanilla-calendar-pro';
import 'vanilla-calendar-pro/build/vanilla-calendar.min.css';

declare const checkinData: string[];

const options: Options = {
    type: 'default',
    // months: 2,
    // jumpMonths: 1,
    settings: {
        iso8601: false,
        range: {
            disabled: checkinData,
        },
        visibility: {
            daysOutside: true,
            theme: 'light',
            weekend: false,
        },
        selection: {
            day: false,
        },
        selected: {
            // holidays: ['2024-01-26', '2024-01-27', '2024-01-26','2024-01-24'],
          },
    },
};

const calendar = new VanillaCalendar('#calendar', options);
calendar.init();
