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
        console.log("We will call the api for testing when this component is mounted and monitor the console to see the response.")
        this.testApi();
    },
    methods: {
        debounceInput: _.debounce(function(e) {
            this.fetchAppResults(this.search_query);
        },300),

        testApi() {
           Axios.get(`/user`).then(res => {
               console.log(res.data);
           }).catch(err => {
               console.err(err?.response?.data?.message || err.message || err);
           });
        },
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
