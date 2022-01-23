<template>
    <div>
        <p>Unread Notifications</p>
        <div v-if="driver_inbox.length !== 0">
            <button
                type="button"
                class="btn btn-secondary"
                @click="markAllAsRead(driver_inbox)"
            >
                Mark all as Read
            </button>
            
            <button
                type="button"
                class="btn btn-danger float-lg-end"
                @click="deleteInbox(driver_inbox)"
            >
                Delete Inbox
            </button>
        </div>
        <br />
        <br />

        <div v-if="driver_inbox.length !== 0">
            <div v-for="unread in driver_inbox" :key="unread.id">
                <!-- If the notification type is Trip Started -->
                <div 
                    class="alert alert-primary"
                    role="alert"
                    v-if="unread.type != notification_type"
                >
                    Your child has been picked from school. Click here to see
                    the details:

                    <hr />
                    <p>{{ unread.id }}</p>
                    <hr />
                    <p>{{ unread.data.trip_id }}</p>

                    <hr />
                    <p>{{ unread.data.body }}</p>
                    <hr />
                    <p>{{ unread.data.action }}</p>

                    <hr />
                    <button
                        type="button"
                        @click="markAsRead(unread)"
                        class="btn btn-primary"
                    >
                        Mark as read
                    </button>
                </div>

                <!-- If the type is Destination Reached -->
                <div class="alert alert-primary" role="alert" v-else>
                    <p>{{ unread.data.message }}</p>
                    <hr />
                    <p>{{ unread.id }}</p>

                    <hr>
                    <button
                        type="button"
                        @click="markAsRead(unread)"
                        class="btn btn-primary"
                    >
                        Mark as read
                    </button>
                </div>
            </div>
        </div>
        <div class="alert alert-primary" role="alert" v-else>
            Your inbox is empty
        </div>
    </div>
</template>

<script>
import Driver from "../index.vue";
import Notification from "./index";
import { mapGetters } from "vuex";
export default {
    components: {
        Driver,
        Notification,
    },
    data() {
        return {
            notification_type: "App\\Notifications\\DestinationReached",
        };
    },

    computed: {
        ...mapGetters({
            driver_inbox: "driver_inbox",
        }),
    },

    methods: {
        async getInbox() {
            this.$store.commit("GET_DRIVER_INBOX");
        },
        async markAsRead(driver_notification) {
            this.$store.commit("READ_DRIVER_NOTIFICATION", driver_notification);
        },

        async deleteInbox(driver_inbox) {
            this.$store.commit("DELETE_DRIVER_INBOX", driver_inbox);
        },

        async markAllAsRead(driver_inbox){
            this.$store.commit('MARK_ALL_DRIVER_AS_READ', driver_inbox);
        }
    },
    mounted() {
        this.getInbox();
    },
};
</script>
