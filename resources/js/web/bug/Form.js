import AppForm from '../app-components/Form/AppForm';

Vue.component('bug-form', {
    mixins: [AppForm],
    props: [],
    data: function() {
        return {
            form: {
                reference_number:  '' ,
                title:  '' ,
                description:  '' ,
                resolved:  false ,
                created_by:  '' ,
                resolved_by:  '' ,
                resolved_at:  '' ,
                
            }
        }
    },
    mounted() {

    },
    methods: {

    }
});
