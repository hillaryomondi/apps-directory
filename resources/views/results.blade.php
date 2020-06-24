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
                <b-button @click="viewDetailModal($event , item)" variant= "primary">
                    View details
                </b-button>
            </div>
        </b-card>
        <b-modal v-if="currentApplication" :title="`New Ticket for ${currentApplication.name}`" ref="ticketModal" id="ticket-modal">
            <div>
                <b-form-input v-model="text" placeholder="Enter your name"></b-form-input>
                <b-form-input v-model="text" aria-placeholder="Enter your email"></b-form-input>
                <b-form-textarea id="textarea" v-model="text" aria-placeholder="Enter something..."rows="4"max-rows="8"><b-form-textarea>
            </div>
        </b-modal>
        <b-modal v-if="currentApplication" :title="`Details for ${currentApplication.name}`" ref="detailModal" id="detail-modal">

        </b-modal>
    </b-card>
</div>
