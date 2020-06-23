<div class="container-fluid">
    <h3 class="mt-2 pt-2 mb-2 pb-2">Search Results for <b class="text-primary">@{{ search_query}}</b> </h3>
    <b-card class="rounded-0 m-0">
        <small class="font-weight-bolder text-muted">Found @{{searchResultsObject.total || 0}} results</small>
        <b-card v-for="item of searchResultsObject.data" :key="item.id">
        <h3 class="text-primary"><a target="_blank" :href="item.url">@{{ item.name }} > <small>@{{ item.formatted_url }}</small></a></h3>
            <div v-html="item.description"></div>
            <div>
                <b-button @click="launchTicketModal($event, item)" variant="danger">
                    report an issue
                </b-button>
                <b-button variant="primary">
                    view details
                </b-button>
            </div>
        </b-card>
        <b-modal v-if="currentApplication" :title="`New Ticket for ${currentApplication.name}`" ref="ticketModal" id="ticket-modal">
            REPORTING AN ISSUE
        </b-modal>
        <b-modal>

        </b-modal>
    </b-card>
</div>
