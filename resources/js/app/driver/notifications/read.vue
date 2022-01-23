<template>
    <div>
        <p>Notifications Panel</p>
        <div v-if="driver_notifications.length !== 0">
            <button
                type="button"
                class="btn btn-danger float-lg-end"
                @click="deleteAll(driver_notifications)"
            >
                Delete all
            </button>
        </div>
        <br />
        <br />
        <!-- page for all notifications -->

        <div v-if="driver_notifications.length !== 0">
            <div v-for="notification in driver_notifications" :key="notification.id">
                <div class="alert alert-secondary" role="alert">
                    Your child has been picked from school. Click here to see
                    the details:
                    <hr />
                    <p>{{ notification.id }}</p>
                    <hr />
                    <p>{{ notification.data.trip_id }}</p>

                    <hr />
                    <p>{{ notification.data.body }}</p>
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
        };
    },

    computed:{
        ...mapGetters({
        driver_notifications: 'driver_notifications'

        })
    },

    methods: {
        async getNotifications() {
            this.$store.commit('GET_ALL_DRIVER_NOTIFICATIONS');
        },

         async deleteNotification(id) {
             this.$store.commit('DELETE_DRIVER_NOTIFICATION', id);
        },

        async deleteAll(driver_notifications){
            this.$store.commit('DELETE_ALL_DRIVER_NOTIFICATIONS', driver_notifications)

        }
    },
    mounted() {
        this.getNotifications();
    },
};
</script>
