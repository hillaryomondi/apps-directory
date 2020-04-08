import AppForm from '../app-components/Form/AppForm';

Vue.component('recipe-form', {
    mixins: [AppForm],
    props: [],
    data: function() {
        return {
            form: {
                recipe_number:  '' ,
                name:  '' ,
                description:  '' ,
                recipe_group_id:  '' ,
                article_id:  '' ,
                cost:  '' ,
                sale_price:  '' ,
                yield:  '' ,
                additional_data:  '' ,
                enabled:  false ,
                
            }
        }
    },
    mounted() {

    },
    methods: {

    }
});
