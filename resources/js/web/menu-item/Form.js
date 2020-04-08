import AppForm from '../app-components/Form/AppForm';

Vue.component('menu-item-form', {
    mixins: [AppForm],
    props: [],
    data: function() {
        return {
            form: {
                recipe_id:  '' ,
                menu_id:  '' ,
                portions:  '' ,
                kitchen_id:  '' ,
                destination_id:  '' ,
                
            }
        }
    },
    mounted() {

    },
    methods: {

    }
});
