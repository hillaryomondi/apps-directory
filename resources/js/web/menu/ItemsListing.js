import AppListing from '../app-components/Listing/AppListing';

Vue.component('menu-menu-items-listing', {
    mixins: [AppListing],
    props: ['menu'],
    data() {
        return {
            kitchen: null,
            destination: null,
            recipe: null,
            portions: 0,
            depots: [],
            recipes: [],
            adding: false,
            editing: false
        }
    },
    mounted() {
       this.fetchDepots();
    },
    methods: {
        onRecipeSelected(recipe) {
            this.portions = recipe.yield;
        },
        fetchRecipes(){
            let vm = this;
            let menu = this.menu;
            vm.recipe = null;
            vm.portions = null;
            vm.kitchen = null;
            vm.destination = null;
            axios.get(`/menu-items/ajax/recipe-options`,{params: {menu_id: menu.id}})
                .then(res => {
                    vm.recipes = res.data.payload;
                }).catch(err => {
                console.log(err.message);
                // vm.articles = [vm.form.article];
                vm.recipes = [];
            });
        },

        fetchDepots(){
            let vm = this;
            axios.get(`/menu-items/ajax/depot-options`)
                .then(res => {
                    vm.depots = res.data.payload;
                }).catch(err => {
                console.log(err.message);
                // vm.articles = [vm.form.article];
                vm.depots = [];
            });
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
                vm.adding = true;
                axios.post(`/menu-items`,{
                    recipe: vm.recipe,
                    portions: vm.portions,
                    kitchen: vm.kitchen,
                    destination: vm.destination,
                    menu: vm.menu
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
                    vm.fetchRecipes();
                    vm.adding = false;
                });
            });
        },
        updateItemPortions(e,item, index) {
            let vm = this;
            axios.put(`/api/menu-items/${item.id}`,{
                'portions': item.portions
            }).then(res => {
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
                vm.loadData(true);
                vm.editing = vm.collection[parseInt(index) + 1];
                // vm.$refs[`editQuantity${vm.editing}`].focus();
            });
        },

        updateItemKitchen(kitchen,item, index) {
            let vm = this;
            axios.put(`/api/menu-items/${item.id}`,{
                'kitchen': kitchen
            }).then(res => {
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
                vm.loadData(true);
                vm.editing = vm.collection[parseInt(index) + 1];
            });
        },
        updateItemDestination(destination,item, index) {
            let vm = this;
            axios.put(`/api/menu-items/${item.id}`,{
                'destination': destination
            }).then(res => {
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
                vm.loadData(true);
                vm.editing = vm.collection[parseInt(index) + 1];
            });
        },

    }
});
