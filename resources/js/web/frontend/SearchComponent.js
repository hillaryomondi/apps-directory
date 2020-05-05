import Vue from "vue"
import _ from "lodash"
import Axios from "axios";
Vue.component('search-component', {
    data() {
        return {
            search_query: null,
            searchResultsObject: {
                data: []
            }
        }
    },
    mounted() {
        console.log("The search component is working.");
    },
    methods: {
        debounceInput: _.debounce(function(e) {
            this.fetchAppResults(this.search_query);
        },300),

        fetchAppResults(query) {
            let vm = this;
            Axios.get(`/search`, {
                params: {
                    search: query
                },
            }).then((res) =>  {
                vm.searchResultsObject = res.data.payload;
            }).catch(err => {
                console.log(err);
            });
        }
    },
});
