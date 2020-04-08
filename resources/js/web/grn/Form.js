import AppForm from '../app-components/Form/AppForm';

Vue.component('grn-form', {
    mixins: [AppForm],
    props: [],
    data: function() {
        return {
            form: {
                grn_number:  '' ,
                lpo_id:  '' ,
                generated_by:  '' ,
                generated_at:  '' ,
                delivery_note_number:  '' ,
                supplier_invoice_number:  '' ,
                
            }
        }
    },
    mounted() {

    },
    methods: {

    }
});
