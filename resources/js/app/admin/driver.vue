<template>
    <div>
        <dashboard/>
        <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
            <div class="row">
                <div class="col">
                    <button class=" btn btn-primary float-right">
                        CREATE DRIVER
                    </button>
                </div>
            </div>

                    <div class="row ">
                        <div class="col-12 col-xl-8 mb-4 mb-lg-0 mx-auto">
                            <div class="card">
                                <h5 class="card-header">Driver details</h5>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table
                                            class="
                                                table
                                                table-bordered
                                                table-striped
                                            "
                                        >
                                            <thead>
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <!-- <th scope="col">Name</th> -->
                                                    <!-- <th scope="col">Phone Number</th> -->
                                                    <th scope="col">Age</th>
                                                    <th scope="col">
                                                        Date Registered
                                                    </th>
                                                    <th scope="col">View</th>
                                                    <th scope="col">Edit</th>
                                                    <th scope="col">Delete</th>

                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr
                                                    v-for="driver in drivers"
                                                    :key="driver.id"
                                                >
                                                    <th scope="row">
                                                        {{ driver.id }}
                                                    </th>
                                                    <!-- <td>{{user.name}}</td> -->
                                                    <!-- <td>{{user.phone_number}}</td> -->
                                                    <td>{{ driver.age }}</td>
                                                    <td>
                                                        {{
                                                            driver.date_registered
                                                        }}
                                                    </td>
                                                    <td>
                                                        <a
                                                            href="#"
                                                            class="
                                                                btn
                                                                btn-sm
                                                                btn-primary
                                                            "
                                                            >View</a
                                                        >
                                                    </td>
                                                    <td>
                                                        <a
                                                            href="#"
                                                            class="
                                                                btn
                                                                btn-sm
                                                                btn-secondary
                                                            "
                                                            >Edit</a
                                                        >
                                                    </td>
                                                    <td>
                                                        <a
                                                            href="#"
                                                            class="
                                                                btn
                                                                btn-sm
                                                                btn-danger
                                                            "
                                                            >Delete</a
                                                        >
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <a href="#" class="btn btn-block btn-light"
                                        >View all</a
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
        
    </div>
</template>

<script>
import Dashboard from './dashboard'
export default {
    components: {
        Dashboard
    },

    data() {
        return {
            user: {},
            token: localStorage.getItem("token"),
            isLoggedIn: false,
            drivers: {},
            errorMessage: null,
        };
    },
    mounted() {
        this.getToken();
        this.getDrivers();
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
        async getDrivers() {
            await axios
                .get("/api/drivers")
                .then((response) => {
                    localStorage.getItem("token");
                    this.drivers = response.data.data;
                    console.log(response.data);
                })
                .catch((errors) => {
                    console.log(errors);
                });
        },
    },
};
</script>

