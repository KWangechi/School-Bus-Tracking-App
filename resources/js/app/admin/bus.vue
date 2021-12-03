<template>
    <div>
        <dashboard />
        <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
            <div class="row">
                <div class="col">
                    <button class=" btn btn-primary float-right">
                        CREATE BUS
                    </button>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-lg-0 mx-auto">
                    <div class="card">
                        <h5 class="card-header">Buses</h5>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table
                                    class="table table-bordered table-striped"
                                >
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Driver ID</th>
                                            <th scope="col">Number Plate</th>
                                            <th scope="col">Date registered</th>
                                            <th scope="col">
                                                Designated Route
                                            </th>
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
                                                    class="
                                                        btn btn-sm btn-primary
                                                    "
                                                    >View</a
                                                >
                                            </td>
                                            <td>
                                                <a
                                                    href="#"
                                                    class="
                                                        btn btn-sm btn-secondary
                                                    "
                                                    >Edit</a
                                                >
                                            </td>
                                            <td>
                                                <a
                                                    href="#"
                                                    class="
                                                        btn btn-sm btn-danger
                                                    "
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
        </main>
    </div>
</template>

<script>
import Dashboard from "./dashboard";
export default {
    components: {
        Dashboard,
    },

    data() {
        return {
            token: localStorage.getItem("token"),
            buses: {},
            errorMessage: null,
        };
    },
    mounted() {
        this.getBuses();
    },
    methods: {
        async getBuses() {
            await axios
                .get("/api/buses")
                .then((response) => {
                    localStorage.getItem("token");
                    this.buses = response.data.data;
                    console.log(response.data);
                })
                .catch((errors) => {
                    console.log(errors);
                });
        },
    },
};
</script>
