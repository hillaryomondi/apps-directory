import AppForm from '../app-components/Form/AppForm';

Vue.component('su-application-form', {
    mixins: [AppForm],
    props: [],
    data: function() {
        return {
            form: {
                name:  '' ,
                description:  '' ,
                enabled:  false ,
                department_id:  '' ,
                
            }
        }
    },
    mounted() {

    },
    methods: {

    }
});
