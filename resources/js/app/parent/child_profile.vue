<template>
    <div>
        <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0 mx-auto">
            <div v-if="!children.length > 0" class="alert alert-primary"
                    role="alert" >
                {{ message}}
            </div>

            <div v-else class="card">
                <h5 class="card-header text-center">Children details</h5>
                <div v-for="child in children" :key="child.id">
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <label>Child's name:</label>
                            {{ child.name }}
                        </li>

                        <li class="list-group-item">
                            <label>Child's class:</label>
                            {{ child.class }}
                        </li>
                    </ul>
                </div>
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
        };
    },

    computed: {
        ...mapGetters({
            children: 'children',
            user: 'user',
            message: 'message'
        })
    },

    methods: {
        async getChild() {
            this.$store.commit('GET_CHILD')
        },
    },
    mounted() {
        this.getChild();

        
    },
};
</script>
