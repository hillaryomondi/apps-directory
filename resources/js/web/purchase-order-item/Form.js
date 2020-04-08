import AppForm from '../app-components/Form/AppForm';

Vue.component('purchase-order-item-form', {
    mixins: [AppForm],
    props: ['purchaseOrder'],
    data: function() {
        return {
            form: {
                article:  null ,
                purchase_order:  '' ,
                derived_unit:  '' ,
                quantity:  '' ,
                price:  '' ,

            },
            articles: [],
            derived_units: []
        }
    },
    mounted() {
        this.form.purchase_order = {...this.purchaseOrder};
        console.log(this.form.purchase_order);
        if (this.purchaseOrder && this.purchaseOrder.id) {
            this.fetchArticleOptions(this.purchaseOrder);
        }
    },
    methods: {
        onOrderSelected(recipe) {
            this.fetchArticleOptions(recipe);
        },
        onArticleSelected(article) {
            this.form.price = article.weighted_cost;
            this.form.derived_unit = article.derived_unit;
            this.fetchDerivedUnitOptions(article);
        },
        fetchArticleOptions(order) {
            let vm = this;
            axios.get(`/purchase-order-items/ajax/article-options`,{params: {purchase_order_id: order.id}})
                .then(res => {
                    vm.articles = res.data.payload;
                }).catch(err => {
                console.log(err.message);
                vm.articles = [vm.form.article];
            });
        },
        fetchDerivedUnitOptions(article) {
            let vm = this;
            axios.get(`/purchase-order-items/ajax/derived-unit-options`,{params: {article_id: article.id}})
                .then(res => {
                    vm.derived_units = res.data.payload;
                    if (!(vm.form.derived_unit && vm.form.derived_unit.id)) {
                        vm.form.derived_unit = article.derived_unit
                    }
                }).catch(err => {
                console.log(err.message);
                vm.derived_units = [vm.form.derived_unit];
            });
        }
    }
});
