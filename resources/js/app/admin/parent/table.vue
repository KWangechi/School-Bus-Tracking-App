<template>
    <div>
        <div class="row">
            <div class="col">
                <button class="btn btn-primary float-right">CREATE PARENT</button>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-lg-0 mx-auto">
                <div class="card">
                    <h5 class="card-header">Parents</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">User ID</th>
                                        <th scope="col">Home Address</th>
                                        <th scope="col">Latitude</th>
                                        <th scope="col">Longitude</th>
                                        <th scope="col">Number of children</th>
                                        <th scope="col">VIew</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="parent in parents"
                                        :key="parent.id"
                                    >
                                        <th scope="row">
                                            {{ parent.id }}
                                        </th>
                                        <td>{{ parent.user_id }}</td>
                                        <td>{{ parent.home_address }}</td>
                                        <td>{{ parent.latitude }}</td>
                                        <td>{{ parent.longitude }}</td>
                                        <td>{{ parent.number_of_children }}</td>
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
        this.getParents();
    },
    computed: {
        ...mapGetters({
            parents: "parents",
        }),
    },
    methods: {
        async getParents() {
            this.$store.commit("GET_PARENTS");
        },
    },
};
</script>
