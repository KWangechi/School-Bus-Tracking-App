<template>
    <div>
        <p>Notifications Panel</p>
        <div v-if="notifications.length !== 0">
            <button
                type="button"
                class="btn btn-danger float-lg-end"
                @click="deleteAll(notifications)"
            >
                Delete all
            </button>
        </div>
        <br />
        <br />

        <div class="alert alert-success" role="alert" v-if="message != null">
            {{ message }}
        </div>

        <!-- page for all notifications -->

        <div v-if="notifications.length !== 0">
            <div v-for="notification in notifications" :key="notification.id">
                <div class="alert alert-secondary" role="alert">
                    Your child has been picked from school. Details here
                    <hr />
                    <p>{{ notification.data.message }}</p>
                    <hr />
                    <p>{{ notification.data.action }}</p>
                    <hr />
                    <button
                        type="button"
                        @click="deleteNotification(notification.id)"
                        class="btn btn-danger"
                    >
                        Delete notification
                    </button>
                </div>
            </div>
        </div>
        <div class="alert alert-danger" role="alert" v-else>
            You have no notifications
        </div>
    </div>
</template>

<script lang="js">
import {mapGetters} from 'vuex'
export default {
    data() {
        return {
            message: null,
            notification_type: "App\\Notifications\\DestinationReached",

        };
    },

    computed:{
        ...mapGetters({
        notifications: 'notifications'

        })
    },

    methods: {
        async getNotifications() {
            this.$store.commit('GET_ALL_NOTIFICATIONS');
        },

         async deleteNotification(id) {
             this.$store.commit('DELETE_NOTIFICATION', id);
        },

        async deleteAll(notifications){
            this.$store.commit('DELETE_ALL_NOTIFICATIONS', notifications)

        }
    },
    mounted() {
        this.getNotifications();
    },
};
</script>
