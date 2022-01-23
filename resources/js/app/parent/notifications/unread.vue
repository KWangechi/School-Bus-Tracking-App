<template>
    <div>
        <p>Unread Notifications</p>
        <div v-if="inbox.length !== 0">
            <button
                type="button"
                class="btn btn-secondary"
                @click="markAllAsRead(inbox)"
            >
                Mark all as Read
            </button>
            <button
                type="button"
                class="btn btn-danger float-lg-end"
                @click="deleteInbox(inbox)"
            >
                Delete Inbox
            </button>
        </div>
        <br />
        <br />

        <div v-if="inbox.length !== 0">
            <div v-for="unread in inbox" :key="unread.id">
                <!-- if the notification type is Trip Started -->
                <div
                    class="alert alert-primary"
                    role="alert"
                    v-if="unread.type != notification_type"
                >
                    Your child has been picked from school. Details here
                    <hr />
                    <p>{{ unread.data.body }}</p>
                    <hr />
                    <button
                        type="button"
                        class="btn btn-secondary"
                        @click="viewMap"
                    >
                        Track their location here
                    </button>
                    <hr />
                    <button
                        type="button"
                        @click="markAsRead(unread)"
                        class="btn btn-primary"
                    >
                        Mark as read
                    </button>
                </div>

                <!-- if notification type is Destination Arrived -->
                <div class="alert alert-primary" role="alert" v-else>
                    <p>{{ unread.data.message }}</p>
                    <hr />
                    <p>{{ unread.id }}</p>
                    <hr />
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
import Guardian from "../index.vue";
import Notification from "./index";
import { mapGetters } from "vuex";
export default {
    components: {
        Guardian,
        Notification,
    },
    data() {
        return {
            notification_type: "App\\Notifications\\DestinationReached",
        };
    },

    computed: {
        ...mapGetters({
            inbox: "inbox",
        }),
    },

    methods: {
        async getInbox() {
            this.$store.commit("GET_INBOX");
        },
        async markAsRead(notification) {
            this.$store.commit("READ_NOTIFICATION", notification);
        },

        async deleteInbox(inbox) {
            this.$store.commit("DELETE_INBOX", inbox);
        },
        async markAllAsRead(inbox) {
            this.$store.commit("MARK_ALL_AS_READ", inbox);
        },
        viewMap() {
            window.location.href = "/parent/map";
        },
    },
    mounted() {
        this.getInbox();
    },
};
</script>
