<template>
<div>
    <driver/>
    <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0 mx-auto">
        <div class="card ">
            <h5 class="card-header">Driver details</h5>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <label for="name">Driver name:</label>
                        {{ user.name }}
                    </li>

                    <li class="list-group-item">
                        <label>Phone number:</label>
                        {{ user.phone_number }}
                    </li>
                    <li class="list-group-item">
                        <label>Age:</label>
                        {{ driver.age }}
                    </li>

                    <li class="list-group-item">
                        <label>Date Registered:</label>
                        {{ driver.date_registered }}
                    </li>
                </ul>
            </div>
        </div>
        <br>
    </div>
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
            driver: {},
            errorMessage: null,
            token: localStorage.getItem("token"),
            user: {},
            isLoggedIn: false,
        };
    },

    methods: {
        async getDriver() {
            await axios
                .get("/api/driver")
                .then((response) => {
                    localStorage.getItem("token");
                    this.driver = response.data.data;
                    console.log(response.data);
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
    },
    mounted() {
        this.getToken();
        this.getDriver();
    },
};
</script>
