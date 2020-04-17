import AppForm from '../app-components/Form/AppForm';

Vue.component('article-form', {
    mixins: [AppForm],
    props: [],
    data: function() {
        return {
            form: {
                id: null,
                sku:  '' ,
                name:  '' ,
                display_name:  '' ,
                description:  '' ,
                article_type:  null ,
                article_group:  null ,
                depot:  null ,
                derived_unit:  null ,
                last_purchase_price:  0.0 ,
                last_ordered_quantity:  0.0 ,
                last_order_time:  null ,
                lifespan_days:  7,
                is_product:  false ,
                last_received_quantity:  0.0 ,
                last_receiving_price:  0.0 ,
                last_received_at:  null ,
                weighted_cost:  0.0 ,
                enabled:  true ,

            }
        }
    },
    mounted() {

    },
    methods: {

    }
});
