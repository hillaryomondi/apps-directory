import AppListing from '../app-components/Listing/AppListing';
import moment from "moment"
Vue.component('purchase-order-listing', {
    mixins: [AppListing],
    data () {
        return {
            t: null,
        }
    },
    mounted() {
        this.t = moment().format('YYYY-MM-DD HH:mm:ss');
        console.log(this.t);
    }
});
