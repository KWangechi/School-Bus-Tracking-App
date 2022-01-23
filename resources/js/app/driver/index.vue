<template>
    <div>
        <nav class="navbar navbar-light bg-light p-3">
            <div
                class="d-flex col-12 col-md-3 col-lg-2 mb-2 mb-lg-0 flex-wrap flex-md-nowrap justify-content-between"
            >
                <a class="navbar-brand" href="/driver">Driver Dashboard </a>
                <button
                    class="navbar-toggler d-md-none collapsed mb-3"
                    type="button"
                    data-toggle="collapse"
                    data-target="#sidebar"
                    aria-controls="sidebar"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="col-12 col-md-4 col-lg-2">
                <input
                    class="form-control form-control-dark"
                    type="text"
                    placeholder="Search"
                    aria-label="Search"
                />
            </div>
            <div
                class="col-12 col-md-5 col-lg-8 d-flex align-items-center justify-content-md-end mt-3 mt-md-0"
            >
                <div class="dropdown">
                    <button
                        class="btn btn-secondary dropdown-toggle"
                        type="button"
                        id="dropdownMenuButton"
                        data-toggle="dropdown"
                        aria-expanded="false"
                    >
                        Hello, {{ user.name }}
                    </button>
                    <ul
                        class="dropdown-menu"
                        aria-labelledby="dropdownMenuButton"
                    >
                        <li>
                            <a class="dropdown-item" @click="logout"
                                >Sign out</a
                            >
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <nav
                    id="sidebar"
                    class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse"
                >
                    <!-- sidebar content goes in here -->
                    <div class="position-sticky pt-md-5">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <router-link to="/driver/map" class="nav-link">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        fill="currentColor"
                                        class="bi bi-map"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M15.817.113A.5.5 0 0 1 16 .5v14a.5.5 0 0 1-.402.49l-5 1a.502.502 0 0 1-.196 0L5.5 15.01l-4.902.98A.5.5 0 0 1 0 15.5v-14a.5.5 0 0 1 .402-.49l5-1a.5.5 0 0 1 .196 0L10.5.99l4.902-.98a.5.5 0 0 1 .415.103zM10 1.91l-4-.8v12.98l4 .8V1.91zm1 12.98 4-.8V1.11l-4 .8v12.98zm-6-.8V1.11l-4 .8v12.98l4-.8z"
                                        />
                                    </svg>
                                    Map/Location
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link
                                    to="/driver/notifications"
                                    class="nav-link"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        fill="none"
                                        class="bi bi-envelope"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    >
                                        <path
                                            d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"
                                        />
                                    </svg>

                                    Inbox

                                    <span v-if="driver_inbox.length == 0"> </span>

                                    <span v-else>
                                        {{ driver_inbox.length }}
                                    </span>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link
                                    to="/driver/profile"
                                    class="nav-link"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        fill="currentColor"
                                        class="bi bi-person-circle"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"
                                        />
                                        <path
                                            fill-rule="evenodd"
                                            d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"
                                        />
                                    </svg>
                                    My profile
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link
                                    to="/driver/scanQrCode"
                                    class="nav-link"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="16"
                                        height="16"
                                        fill="currentColor"
                                        class="bi bi-qr-code-scan"
                                        viewBox="0 0 16 16"
                                    >
                                        <path
                                            d="M0 .5A.5.5 0 0 1 .5 0h3a.5.5 0 0 1 0 1H1v2.5a.5.5 0 0 1-1 0v-3Zm12 0a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0V1h-2.5a.5.5 0 0 1-.5-.5ZM.5 12a.5.5 0 0 1 .5.5V15h2.5a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5v-3a.5.5 0 0 1 .5-.5Zm15 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H15v-2.5a.5.5 0 0 1 .5-.5ZM4 4h1v1H4V4Z"
                                        />
                                        <path
                                            d="M7 2H2v5h5V2ZM3 3h3v3H3V3Zm2 8H4v1h1v-1Z"
                                        />
                                        <path
                                            d="M7 9H2v5h5V9Zm-4 1h3v3H3v-3Zm8-6h1v1h-1V4Z"
                                        />
                                        <path
                                            d="M9 2h5v5H9V2Zm1 1v3h3V3h-3ZM8 8v2h1v1H8v1h2v-2h1v2h1v-1h2v-1h-3V8H8Zm2 2H9V9h1v1Zm4 2h-1v1h-2v1h3v-2Zm-4 2v-1H8v1h2Z"
                                        />
                                        <path d="M12 9h2V8h-2v1Z" />
                                    </svg>
                                    Scan a QR Code
                                </router-link>
                            </li>
                        </ul>
                    </div>
                </nav>
                <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
                    <router-view />
                </main>
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters } from "vuex";
export default {
    data() {
        return {
            errorMessage: null,
        };
    },
    mounted() {
        if (!this.setUser()) {
            window.location.href = "/login";
        }
        else{
            this.getUser();
            this.getInbox();
            
        }
        
    },
    computed: {
        ...mapGetters({
            user: "user",
            driver: "driver",
            driver_inbox: "driver_inbox",
        }),
    },
    methods: {
        async logout(e) {
            e.preventDefault();
            this.$store.commit("LOGOUT_USER");
        },
        async getUser() {
            this.$store.commit("GET_USER");
        },
        async setUser() {
            this.$store.commit("SET_USER");
        },
        async getInbox() {
            this.$store.commit("GET_DRIVER_INBOX");
        },
    },
};
</script>

<style>
.sidebar {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    z-index: 100;
    padding: 90px 0 0;
    box-shadow: inset -1px 0 0 rgba(0, 0, 0, 0.1);
    z-index: 99;
}

@media (max-width: 767.98px) {
    .sidebar {
        top: 11.5rem;
        padding: 0;
    }
}

.navbar {
    box-shadow: inset 0 -1px 0 rgba(0, 0, 0, 0.1);
}

@media (min-width: 767.98px) {
    .navbar {
        top: 0;
        position: sticky;
        z-index: 999;
    }
}

.sidebar .nav-link {
    color: #333;
}

.sidebar .nav-link.active {
    color: #0d6efd;
}
</style>
