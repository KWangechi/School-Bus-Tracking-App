<template>
    <div>
        <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0 mx-auto">
            <div class="card">
                <h5 class="card-header">Parent details</h5>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <label for="name">Parent name:</label>
                            {{ user.name }}
                        </li>

                        <li class="list-group-item">
                            <label>Phone number:</label>
                            {{ user.phone_number }}
                        </li>
                        <li class="list-group-item">
                            <label>Number of children:</label>
                            {{ guardian.number_of_children }}
                        </li>

                        <li class="list-group-item">
                            <label>Home address:</label>
                            {{ guardian.home_address }}
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
            guardian: 'guardian',
            user: 'user'
        })
    },

    methods: {
        async getParent() {
            this.$store.commit('GET_GUARDIAN')
        },
        async getUser() {
            this.$store.commit('GET_USER')
        },
    },
    mounted() {
        this.getUser();
        this.getParent();

        
    },
};
</script>
