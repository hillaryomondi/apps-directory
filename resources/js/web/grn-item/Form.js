import AppForm from '../app-components/Form/AppForm';

Vue.component('grn-item-form', {
    mixins: [AppForm],
    props: [],
    data: function() {
        return {
            form: {
                purchase_order_item_id:  '' ,
                grn_id:  '' ,
                derived_unit_id:  '' ,
                quantity:  '' ,
                price:  '' ,
                
            }
        }
    },
    mounted() {

    },
    methods: {

    }
});
