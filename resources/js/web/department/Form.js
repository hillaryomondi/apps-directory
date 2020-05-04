import AppForm from '../app-components/Form/AppForm';

Vue.component('department-form', {
    mixins: [AppForm],
    props: [],
    data: function() {
        return {
            form: {
                name:  '' ,
                display_name:  '' ,
                description:  '' ,
                enabled:  false ,

            }
        }
    },
    mounted() {
        this.fetchAllDepartments();

    },
    methods: {
        fetchAllDepartments(){
            axios.get('/departments').then(res => {
                console.log(res.data);
            }).catch(err => {
                console.error(err);
            })
        }


    }
});
