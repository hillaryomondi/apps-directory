import AppForm from '../app-components/Form/AppForm';

Vue.component('lpo-form', {
    mixins: [AppForm],
    props: [],
    data: function() {
        return {
            form: {
                lpo_number:  '' ,
                purchase_order_id:  '' ,
                published_by:  '' ,
                published_at:  '' ,
                expires_at:  '' ,
                
            }
        }
    },
    mounted() {

    },
    methods: {

    }
});
