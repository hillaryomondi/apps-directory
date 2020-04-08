import AppListing from '../app-components/Listing/AppListing';

Vue.component('items-listing', {
    mixins: [AppListing],
    props: ['purchaseOrder'],
    data () {
        return {
            editing: null,
            derived_units: [],
            articles: [],
            current_article: null,
            current_quantity: null,
            adding : false,
        }
    },
    mounted() {
    },
    methods: {
        updateItemQuantity(e,item, index) {
            let vm = this;
            axios.put(`/api/purchase-order-items/${item.id}`,{
                'quantity': item.quantity
            }).then(res => {
                vm.collection[parseInt(index)] = {...res.data.payload};
                vm.$notify({
                    type: "success",
                    text: res.data.message
                });
            }).catch(err => {
                vm.$notify({
                    type: "error",
                    text: err.response.data.message || err.message
                });
            }).finally(() => {
                vm.editing = vm.collection[parseInt(index) + 1];
                vm.$refs[`editQuantity${vm.editing}`].focus();
            });
        },
        updateItemPrice(e, item, index) {
            let vm = this;
            axios.put(`/api/purchase-order-items/${item.id}`,{
                'price': item.price
            }).then(res => {
                vm.collection[parseInt(index)] = {...res.data.payload};
                vm.$notify({
                    type: "success",
                    text: res.data.message
                });
            }).catch(err => {
                vm.$notify({
                    type: "error",
                    text: err.response.data.message || err.message
                });
            }).finally(() => {
                vm.editing = vm.collection[parseInt(index)+1];
                vm.$refs[`editPrice${vm.editing}`].focus();
            })
        },
        updateItemDerivedUnit(du,item, index) {
            let vm = this;
            console.log(du);
            axios.put(`/api/purchase-order-items/${item.id}`,{
                'derived_unit': du
            }).then(res => {
                vm.collection[parseInt(index)] = {...res.data.payload};
                vm.$notify({
                    type: "success",
                    text: res.data.message
                });
            }).catch(err => {
                if (err.response) {
                    vm.collection[parseInt(index)] = {...err.response.data.payload};
                }
                vm.$notify({
                    type: "error",
                    text: err.response.data.message || err.message
                });
            }).finally(() => {
                vm.editing = vm.collection[parseInt(index)+1];
                vm.$refs[`editDerivedUnit${vm.editing}`].focus();
            })
        },
        fetchDerivedUnits(articleId) {
            let vm = this;
            axios.get(`/purchase-order-items/ajax/derived-unit-options`,{params: {article_id: articleId}})
                .then(res => {
                    vm.derived_units = res.data.payload;
                }).catch(err => {
                // vm.derived_units = [vm.form.derived_unit];
            });
        },
        fetchArticles(){
            let vm = this;
            let order = this.purchaseOrder;
            vm.current_article = null;
            vm.current_quantity = null;
            axios.get(`/purchase-order-items/ajax/article-options`,{params: {purchase_order_id: order.id}})
                .then(res => {
                    vm.articles = res.data.payload;
                }).catch(err => {
                console.log(err.message);
                // vm.articles = [vm.form.article];
                vm.articles = [];
            });
        },
        focusQuantity() {
            this.$refs.currentQuantity.focus();
        },
        quickAddItem() {
            let vm = this;
            this.$validator.validateAll().then(result => {
                if(!result) {
                    vm.$notify({
                        type: "error",
                        text: "Validation failed. Please correct all validation errors first"
                    });
                    return false;
                }
                this.adding = true;
                axios.post(`/purchase-order-items`,{
                    article: vm.current_article,
                    quantity: vm.current_quantity,
                    derived_unit: vm.current_article.derived_unit,
                    price: vm.current_article.weighted_cost,
                    purchase_order: vm.purchaseOrder
                }).then(res => {
                    vm.$notify({
                        type: "success",
                        text: res.data.message
                    });
                }). catch (err => {
                    vm.$notify({
                        type: "error",
                        text: err.response ? err.response.data.message : err.message || err,
                    })
                }).finally(() => {
                    vm.loadData(true);
                    vm.fetchArticles();
                    vm.adding = false;
                });
            });
        }
    },
    watch: {
        editing: function(c, o) {
            console.log('Editing has changed to '+ c);
            this.derived_units = [];
            if (c) {
                let item = this.collection.find(item => {
                    return item.id === c;
                });
                if (item) {
                    this.fetchDerivedUnits(item.article_id);
                }
            }
        }
    }
});
