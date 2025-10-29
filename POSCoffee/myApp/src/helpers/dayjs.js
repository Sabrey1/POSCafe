// src/plugins/dayjs.js
import dayjs from "dayjs";

// Optional: import plugins you want
import relativeTime from "dayjs/plugin/relativeTime";
import utc from "dayjs/plugin/utc";
import timezone from "dayjs/plugin/timezone";

// Optional: import your locale (example: Khmer)
import "dayjs/locale/km";

// Extend plugins
dayjs.extend(relativeTime);
dayjs.extend(utc);
dayjs.extend(timezone);

// Set default locale
dayjs.locale("km");

// Export for use
export default dayjs;
