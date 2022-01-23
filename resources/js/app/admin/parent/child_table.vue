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
                    <h5 class="card-header">Parents</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Parent ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Class</th>
                                        <th scope="col">View</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="child in children"
                                        :key="child.id"
                                    >
                                        <th scope="row">
                                            {{ child.id }}
                                        </th>
                                        <td>{{ child.parent_id }}</td>
                                        <td>{{ child.name }}</td>
                                        <td>{{ child.class }}</td>
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
        this.getChildren();
    },
    computed: {
        ...mapGetters({
            children: "children",
        }),
    },
    methods: {
        async getChildren() {
            this.$store.commit("GET_CHILDREN");
        },
    },
};
</script>
