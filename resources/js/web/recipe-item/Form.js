import AppForm from '../app-components/Form/AppForm';

Vue.component('recipe-item-form', {
    mixins: [AppForm],
    props: ['recipe','recipes'],
    data: function() {
        return {
            form: {
                quantity:  1,
                derived_unit:  null ,
                article:  null ,
                recipe:  null ,
                position:  1 ,
            },
            derived_units: [],
            articles: []
        }
    },
    mounted() {
        this.form.recipe = {...this.recipe};
        if (this.form.recipe.id) {
            this.fetchArticleOptions(this.form.recipe)
        }
        if (this.form.id && this.form.article.id) {
            //when editing, fetch derived Units
            this.fetchDerivedUnitOptions(this.form.article);
        }
    },
    methods: {
        onRecipeSelected(recipe) {
            this.fetchArticleOptions(recipe);
        },
        onArticleSelected(article) {
            this.fetchDerivedUnitOptions(article);
        },
        fetchArticleOptions(recipe) {
            let vm = this;
            axios.get(`/recipe-items/ajax/article-options`,{params: {recipe_id: recipe.id}})
                .then(res => {
                    vm.articles = res.data.payload;
                }).catch(err => {
                    console.log(err.message);
                    vm.articles = [vm.form.article];
            });
        },
        fetchDerivedUnitOptions(article) {
            let vm = this;
            axios.get(`/recipe-items/ajax/derived-unit-options`,{params: {article_id: article.id}})
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
