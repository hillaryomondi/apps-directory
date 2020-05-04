import AppForm from '../app-components/Form/AppForm';

Vue.component('screenshot-form', {
    mixins: [AppForm],
    props: [],
    data: function() {
        return {
            form: {
                file_path:  '' ,
                
            }
        }
    },
    mounted() {

    },
    methods: {

    }
});
