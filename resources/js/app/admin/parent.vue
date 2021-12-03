<template>
    <div>
        <dashboard/>
        <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
            <div class="row">
                <div class="col">
                    <button class=" btn btn-primary float-right">
                        CREATE PARENT
                    </button>
                </div>
            </div>

                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-lg-0 mx-auto">
                            <div class="card">
                                <h5 class="card-header">Parent details</h5>
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
                                                    <th scope="col">User ID</th>
                                                    <th scope="col">Home Adress</th>
                                                    <th scope="col">Latitude</th>
                                                    <th scope="col">Longitude</th>
                                                    <th scope="col">
                                                        Number of children
                                                    </th>
                                                    <th scope="col">View</th>
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
                                                    <td>{{parent.user_id}}</td>
                                                    <td>{{parent.home_address}}</td>
                                                    <td>{{ parent.latitude }}</td>
                                                    <td>
                                                        {{
                                                            parent.longitude
                                                        }}
                                                    </td>
                                                    <td>{{ parent.number_of_children }}</td>
                                                    
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
            token: localStorage.getItem("token"),
            parents: {},
            errorMessage: null,
        };
    },
    mounted() {
        this.getParents();
    },
    methods: {
        async getParents() {
            await axios
                .get("/api/parents")
                .then((response) => {
                    localStorage.getItem("token");
                    this.parents = response.data.data;
                    console.log(response.data);
                })
                .catch((errors) => {
                    console.log(errors);
                });
        },
    },
};
</script>
