<template>
    <div>
        <div class="row">
            <div class="col">
                <button class="btn btn-primary float-right">CREATE BUS</button>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-lg-0 mx-auto">
                <div class="card">
                    <h5 class="card-header">Buses</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Driver ID</th>
                                        <th scope="col">Number Plate</th>
                                        <th scope="col">Date registered</th>
                                        <th scope="col">Designated Route</th>
                                        <th scope="col">View</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="bus in buses" :key="bus.id">
                                        <th scope="row">
                                            {{ bus.id }}
                                        </th>
                                        <td>{{ bus.driver_id }}</td>
                                        <td>{{ bus.number_plate }}</td>
                                        <td>{{ bus.date_registered }}</td>
                                        <td>{{ bus.designated_route }}</td>
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
        this.getBuses();
    },
    computed: {
        ...mapGetters({
            buses: "buses",
        }),
    },
    methods: {
        async getBuses() {
            this.$store.commit("GET_BUSES");
        },
    },
};
</script>
