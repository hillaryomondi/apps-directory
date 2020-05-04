import AppForm from '../app-components/Form/AppForm';

Vue.component('su-application-form', {
    mixins: [AppForm],
    props: ['departments'],
    data: function() {
        return {
            form: {
                name:  '' ,
                url:  '' ,
                description:  '' ,
                enabled:  false ,
                department:  null ,

            }
        }
    },
    mounted() {

    },
    methods: {

    }
});
