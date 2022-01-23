<template>
    <div>
        <nav class="navbar navbar-light bg-light p-3">
            <div
                class="d-flex col-12 col-md-3 col-lg-2 mb-2 mb-lg-0 flex-wrap flex-md-nowrap justify-content-between"
            >
                <a class="navbar-brand" href="/admin"> Admin Dashboard </a>
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
                            <a class="dropdown-item" href="/admin/profile"
                                >My profile</a
                            >
                        </li>
                        <li>
                            <a class="dropdown-item" href="/admin/messages"
                                >Messages</a
                            >
                        </li>
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
                    <div class="position-sticky pt-md-5">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <router-link to="/admin/users" class="nav-link">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="feather feather-home"
                                    >
                                        <path
                                            d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"
                                        ></path>
                                        <polyline
                                            points="9 22 9 12 15 12 15 22"
                                        ></polyline>
                                    </svg>
                                    Users
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link
                                    to="/admin/drivers"
                                    class="nav-link"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="feather feather-file"
                                    >
                                        <path
                                            d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"
                                        ></path>
                                        <polyline
                                            points="13 2 13 9 20 9"
                                        ></polyline>
                                    </svg>
                                    Drivers
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link
                                    to="/admin/parents"
                                    class="nav-link"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="16"
                                        height="16"
                                        fill="currentColor"
                                        class="bi bi-person"
                                        viewBox="0 0 16 16"
                                    >
                                        <path
                                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"
                                        />
                                    </svg>
                                    Parents
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link
                                    to="/admin/children"
                                    class="nav-link"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="feather feather-users"
                                    >
                                        <path
                                            d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"
                                        ></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                        <path
                                            d="M23 21v-2a4 4 0 0 0-3-3.87"
                                        ></path>
                                        <path
                                            d="M16 3.13a4 4 0 0 1 0 7.75"
                                        ></path>
                                    </svg>
                                    Children
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/admin/buses" class="nav-link">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="feather feather-bar-chart-2"
                                    >
                                        <line
                                            x1="18"
                                            y1="20"
                                            x2="18"
                                            y2="10"
                                        ></line>
                                        <line
                                            x1="12"
                                            y1="20"
                                            x2="12"
                                            y2="4"
                                        ></line>
                                        <line
                                            x1="6"
                                            y1="20"
                                            x2="6"
                                            y2="14"
                                        ></line>
                                    </svg>
                                    Buses
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
        return {};
    },
    computed: {
        ...mapGetters({
            user: "user",
        }),
    },
    mounted() {
        this.getUser();
    },
    methods: {
        async logout(e) {
            e.preventDefault();
            this.$store.commit("LOGOUT_USER");
        },
        async getUser() {
            this.$store.commit("GET_USER");
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
