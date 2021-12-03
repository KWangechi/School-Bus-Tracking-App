<template>
<div>
        <nav class="navbar navbar-light bg-light p-3">
            <div
                class="
                    d-flex
                    col-12 col-md-3 col-lg-2
                    mb-2 mb-lg-0
                    flex-wrap flex-md-nowrap
                    justify-content-between
                "
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
                class="
                    col-12 col-md-5 col-lg-8
                    d-flex
                    align-items-center
                    justify-content-md-end
                    mt-3 mt-md-0
                "
            >
                <div class="dropdown">
                    <button
                        class="btn btn-secondary dropdown-toggle"
                        type="button"
                        id="dropdownMenuButton"
                        data-toggle="dropdown"
                        aria-expanded="false"
                    >
                        Hello, {{user.name}}
                    </button>
                    <ul
                        class="dropdown-menu"
                        aria-labelledby="dropdownMenuButton"
                    >
                        <li>
                            
                                <a class="dropdown-item" @click="logout">Sign out</a>
                                
                                </li>
                                
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <nav
                    id="sidebar"
                    class="
                        col-md-3 col-lg-2
                        d-md-block
                        bg-light
                        sidebar
                        collapse
                    "
                >
                    <!-- sidebar content goes in here -->
                    <div class="position-sticky pt-md-5">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <router-link to="/map" class="nav-link active">
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
                                    Map/Location
                                
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/notifications" class="nav-link">
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
                                    
                                    Notifications

                                    <span v-if="notifications.length==0">

                                    </span>

                                    <span v-else>
                                    {{notifications.length}}
                                    </span>

                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/profile" class="nav-link">
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
                                        class="feather feather-shopping-cart"
                                    >
                                        <circle cx="9" cy="21" r="1"></circle>
                                        <circle cx="20" cy="21" r="1"></circle>
                                        <path
                                            d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"
                                        ></path>
                                    </svg>
                                     My profile
                                </router-link>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
                    <h1 class="h2">Dashboard</h1>
                    <p class="text-center">
                        This is the homepage of a simple admin interface which
                        is part of a tutorial written on Themesberg
                    </p>
                </main> -->
            </div>
        </div>
    </div>


</template>

<script>
export default {
    data() {
        return {
            user: {},
            token: localStorage.getItem("token"),
            isLoggedIn: false,
            errorMessage: null,
            notifications:{}
        };
    },
    mounted() {
        this.getToken();
        this.getNotifications();
    },
    methods: {
        async logout(e) {
            e.preventDefault();
            await axios
                .post("/api/logout")
                .then((response) => {
                    localStorage.removeItem("token");
                    if (response.data.success) {
                        window.location.href = "/login";
                        console.log(response.data);
                    } else {
                        console.log(response);
                    }
                })
                .catch(function (error) {
                    console.error(error);
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
}
}
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