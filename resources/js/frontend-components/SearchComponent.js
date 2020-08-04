import Vue from "vue"
import _ from "lodash"
import Axios from "axios";
Vue.component('search-component', {
    data() {
        return {
            search_query: null,
            searchResultsObject: {
                data: []
            },
            ticket: {
                title: null,
                description: null,
                reporter_name: null,
                reporter_email: null,
            },
            currentApplication: null,
            searched: false //initially false before we search.
        }
    },
    mounted() {
    },
    methods: {
        debounceInput: _.debounce(function(e) {
            this.fetchAppResults(this.search_query);
        },300),

        testApi() {
           Axios.get(`/user`).then(res => {
               console.log(res.data);
           }).catch(err => {
               console.error(err?.response?.data?.message || err.message || err);
           });
        },
        fetchAppResults(query) {
            let vm = this;
            Axios.get(`/api/search`, {
                params: {
                    search: query
                },
            }).then((res) =>  {
                //When we hit results, we set searched = true

                vm.searchResultsObject = res.data.payload;
                vm.searched = true;
            }).catch(err => {
                console.log(err);
                //If an error occured we set searched = false;
                vm.searched = false;
            });
        },
        submitTicket() {
            const vm = this;
            Axios
                .post(`/api/su-applications/${vm.currentApplication.id}/create-ticket`, vm.ticket)
                .then(res => {

                alert ("Your ticket has been submitted successfully and an email will be sent to the support team to resolve it.")
                })
                .catch(error => {
                    console.log(error);
                });
        },
        launchTicketModal(e, item) {
            let vm = this;
            this.currentApplication = {...item};

            vm.ticket = {
                "title": null,
                "description": null,
                "reporter_name": null,
                "reporter_email": null,
            };
            vm.$nextTick(function() {
                vm.$refs.ticketModal.show();
            })
        },
        viewDetails(e, item){
            let vm = this;
            this.currentApplication =   {...item};
            vm.$nextTick(function() {
                vm.$refs.detailModal.show()
            })
        }
    },
});
