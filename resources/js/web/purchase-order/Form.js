import AppForm from '../app-components/Form/AppForm';

Vue.component('purchase-order-form', {
    mixins: [AppForm],
    props: [],
    data: function() {
        return {
            form: {
                order_number:  '' ,
                ordered_by:  '' ,
                supplier:  null ,
                order_status_id:  '' ,
                authorization_status_id:  '' ,
                depot:  null ,
                authorized_by:  '' ,
                authorized_at:  '' ,
                ordered_at:  '' ,
                delivery_date: '',
                delivered_at:  '' ,
                received_by:  '' ,
                published_at:  '' ,
                enabled:  true ,
                total: 0
            },
            refreshing: false
        }
    },
    mounted() {
        let config = {
            minDate: moment().format('YYYY-MM-DD HH:mm:00')
        };
        this.datetimePickerConfig = {...this.datetimePickerConfig, ...config};
    },
    methods: {
        refresh() {
            let vm = this;
            if (!vm.form.id) {
                vm.$notify({
                    type : 'error',
                    text: "Invalid purchase order"
                });
                return false;
            }
            vm.refreshing = true;
            axios.get(`/api/purchase-orders/${vm.form.id}`).then (res => {
                vm.form = {...res.data.payload};
                vm.$notify({
                    type : 'success',
                    text: "Data refreshed"
                });
            }).catch(err => {
                vm.$notify({
                    type : 'error',
                    text: err.response ? (err.response.data.message || err) : (err.message || "Server Error")
                });
            }).finally(() => {
                vm.refreshing = false;
            })
        }
    }
});
