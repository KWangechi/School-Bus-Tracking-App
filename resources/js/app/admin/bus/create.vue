<template>
    
</template>

<script>
export default {
    data(){
        return{

        }
    },
    methods:{
        getBuses(){
            this.$store.commit('GET_BUSES');
        }
    },
    computed:{},
    mounted(){
        this.getBuses();

    }
}
</script>