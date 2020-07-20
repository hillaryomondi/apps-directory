<div class="container-fluid">
    <h3 class="mt-2 pt-2 mb-2 pb-2">Search Results for <b class="text-primary">@{{ search_query}}</b> </h3>
    <b-card class="rounded-0 m-0">
        <small class="font-weight-bolder text-muted">Found @{{searchResultsObject.total || 0}} results</small>
        <b-card v-for="item of searchResultsObject.data" :key="item.id">
        <h3 class="text-primary"><a target="_blank" :href="item.url">@{{ item.name }} > <small>@{{ item.formatted_url }}</small></a></h3>
            <div v-html="item.description"></div>
            <div>
                <b-button @click="launchTicketModal($event, item)" variant="danger">
                    Report an issue
                </b-button>
                <b-button @click="viewDetails($event , item)" variant= "primary">
                    View details
                </b-button>
            </div>
        </b-card>
        <b-modal @ok="submitTicket" v-if="currentApplication" :title="`New Ticket for ${currentApplication.name}`" ref="ticketModal" id="ticket-modal">
            <template v-slot:default="{ok, cancel}">
                <b-form @submit.prevent="ok">
                    @auth
                        <h4>{{auth()->user()->name}}</h4>
                    @else
                        <b-form-group label="Your Name">
                            <b-form-input type="text" v-model="ticket.reporter_name" placeholder="Enter your name"></b-form-input>
                        </b-form-group>
                        <b-form-group label="Your Email">
                            <b-form-input type="text" v-model="ticket.reporter_email" placeholder="Enter your email"></b-form-input>
                        </b-form-group>
                    @endauth
                    <b-form-group label="Ticket Title">
                        <b-form-input type="text" placeholder="What is this about?" v-model="ticket.title"></b-form-input>
                    </b-form-group>
                    <b-form-group label="Description">
                        <b-form-textarea id="textarea" v-model="ticket.description" placeholder="Tell us more about the problem you experienced." rows="4" max-rows="8"></b-form-textarea>
                    </b-form-group>
                    <b-button class="d-none" type="submit"></b-button>
                </b-form>
            </template>
        </b-modal>
        <b-modal v-if="currentApplication" :title="`Details for ${currentApplication.name}`" ref="detailModal" id="detail-modal" >
            {{--TODO: Populate the app details here (Only the ones necessary or relevant) --}}
            <b-form-group label-cols="4" label="App Name">
                <span class="form-control">
                    @{{ currentApplication.name }}
                </span>
            </b-form-group>
            <b-form-group label-cols="4" label="App Description">

                <div class="border p-2" v-html="currentApplication.description">


                </div>

            </b-form-group>
        </b-modal>
    </b-card>
</div>
