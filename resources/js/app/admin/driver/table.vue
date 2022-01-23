<template>
    <div>
        <div class="row">
            <div class="col">
                <button class="btn btn-primary float-right">CREATE DRIVER</button>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-lg-0 mx-auto">
                <div class="card">
                    <h5 class="card-header">Drivers</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">User ID</th>
                                        <th scope="col">Age</th>
                                        <th scope="col">Date registered</th>
                                        <th scope="col">View</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="driver in drivers" :key="driver.id">
                                        <th scope="row">
                                            {{ driver.id }}
                                        </th>
                                        <td>{{ driver.user_id }}</td>
                                        <td>{{ driver.age }}</td>
                                        <td>{{ driver.date_registered }}</td>
                                        <td>
                                            <a
                                                href="#"
                                                class="btn btn-sm btn-primary"
                                                >View</a
                                            >
                                        </td>
                                        <td>
                                            <a
                                                href="#"
                                                class="btn btn-sm btn-secondary"
                                                >Edit</a
                                            >
                                        </td>
                                        <td>
                                            <a
                                                href="#"
                                                class="btn btn-sm btn-danger"
                                                >Delete</a
                                            >
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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
    mounted() {
        this.getDrivers();
    },
    computed: {
        ...mapGetters({
            drivers: "drivers",
        }),
    },
    methods: {
        async getDrivers() {
            this.$store.commit("GET_DRIVERS");
        },
    },
};
</script>
