<template>
    <div>
        <driver />
        <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
            <h1 class="h2">Dashboard</h1>
            <p>Notifications Panel</p>
            <div
                class="alert alert-success"
                role="alert"
                v-if="successMessage !== null"
            >
                {{ successMessage }}
            </div>
            <div v-for="notification in notifications" :key="notification.id">
                <div
                    class="alert alert-danger"
                    role="alert"
                    v-if="!notifications"
                    id="notification"
                >
                    You have no notifications
                </div>
                <div class="alert alert-primary" role="alert" v-else>
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
                        @click="markAsRead(notification)"
                        class="btn btn-secondary"
                    >
                        Mark as read
                    </button>
                </div>
            </div>
        </main>
    </div>
</template>

<script>
import Driver from "./index";
export default {
    components: {
        Driver,
    },
    data() {
        return {
            notifications: {},
            token: localStorage.getItem("token"),
            user: {},
            isLoggedIn: false,
            successMessage: null,
        };
    },

    methods: {
        async getNotifications() {
            await axios
                .get("/api/notifications")
                .then((response) => {
                    localStorage.getItem("token");
                    this.notifications = response.data.data;
                    console.log(response.data.data);
                })
                .catch((errors) => {
                    console.log(errors);
                });


        },
        async getToken() {
            axios.defaults.headers.common[
                "Authorization"
            ] = `Bearer ${this.token}`;

            await axios
                .get("/api/user")
                .then((response) => {
                    this.user = response.data;
                    this.isLoggedIn = true;
                })
                .catch((errors) => {
                    console.log(errors);
                });
        },
        async markAsRead(notification) {
            await axios
                .post("/api/markNotification", { id: notification.id })
                .then((response) => {
                    localStorage.getItem("token");
                    console.log(response);
                    if (response.data.success) {
                        console.log("Message should be marked as read");
                        window.location.href = "/notifications";
                        this.successMessage =
                            "Message has been marked as read!!";
                    } else {
                        this.successMessage =
                            "Something went wrong! Please try again";
                    }
                })
                .catch((errors) => {
                    console.log(errors);
                });
        },
    },
    mounted() {
        this.getToken();
        this.getNotifications();
    },
};
</script>
