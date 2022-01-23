<template>
    <div>
        <div class="row">
            <div class="col">
                <button class="btn btn-primary float-right">CREATE USER</button>
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
                                        <th scope="col">Role ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email Address</th>
                                        <th scope="col">Phone number</th>
                                        <th scope="col">Remember token</th>
                                        <th scope="col">VIew</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="user in users" :key="user.id">
                                        <th scope="row">
                                            {{ user.id }}
                                        </th>
                                        <td>{{ user.role_id }}</td>
                                        <td>{{ user.name }}</td>
                                        <td>{{ user.email }}</td>
                                        <td>{{ user.phone_number }}</td>
                                        <td>{{ user.remember_token }}</td>
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
        this.getUsers();
    },
    computed: {
        ...mapGetters({
            users: "users",
        }),
    },
    methods: {
        async getUsers() {
            this.$store.commit("GET_USERS");
        },
    },
};
</script>
