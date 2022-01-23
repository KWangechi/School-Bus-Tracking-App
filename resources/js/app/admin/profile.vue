<template>
    <div>
        <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0 mx-auto">
            <div class="card">
                <h5 class="card-header">My details</h5>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <label for="name">Name:</label>
                            {{ user.name }}
                        </li>

                        <li class="list-group-item">
                            <label>Email:</label>
                            {{ user.email }}
                        </li>
                        <li class="list-group-item">
                            <label>Phone number:</label>
                            {{ user.phone_number }}
                        </li>
                    </ul>
                </div>
            </div>
            <br />
        </div>
    </div>
</template>

<script>
import {mapGetters} from 'vuex'
export default {
    data() {
        return {
            errorMessage: null,
        };
    },

    computed: {
        ...mapGetters({
            user: 'user'
        })
    },

    methods: {
        async getUser() {
            this.$store.commit('GET_USER')
        },
    },
    mounted() {
        this.getUser();
    },
};
</script>
