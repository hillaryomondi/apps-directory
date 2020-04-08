import { BaseListing } from 'craftable';
import moment from "moment";
export default {
	mixins: [BaseListing],
    data() {
	    return {
	        t: null,
        }

    },
    mounted() {
	    this.t = moment().format('YYYY-MM-DD HH:mm:ss');
	    // console.log(this.now);
	    // console.log("OVerriding datetimePickerConfig");
        this.datetimePickerConfig = {
                ...this.datetimePickerConfig,
                enableTime: true,
                time_24hr: true,
                enableSeconds: true,
                dateFormat: 'Y-m-d H:i:S',
                altInput: false,
                altFormat: 'd.m.Y H:i:S',
                locale: 'en',
                timezone: 'Africa/Nairobi',
                inline: true
        }
    },
    methods: {
	    moment: moment
    }
};
