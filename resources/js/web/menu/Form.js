import AppForm from '../app-components/Form/AppForm';

Vue.component('menu-form', {
    mixins: [AppForm],
    props: [],
    data: function() {
        return {
            form: {
                id: null,
                menu_number:  '' ,
                display_name:  '' ,
                notes:  '' ,
                menu_date:  '' ,
                creator:  null ,
                published_at:  null,
                publish_now: '',
                enabled:  false ,

            },
            editing_notes: false
        }
    },
    mounted() {

    },
    methods: {

    }
});
