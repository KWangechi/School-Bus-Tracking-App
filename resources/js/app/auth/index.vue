<template>
    <div class="container">
        <div class="text-center" style="margin: 20px 0px 20px 0px">
            <a href="/home" target="_blank"
                ><img src="/images/bus-logo.jpg" /></a
            ><br />
            <span class="text-secondary">School Bus Tracking APP</span>
            <h1>This is the landing page for the application</h1>
        </div>

        <div class="alert alert-danger" role="alert" v-if="errorMessage !== null">
                    {{ errorMessage }}
                </div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <router-link to="/home" class="nav-item nav-link"
                        >Home</router-link
                    >
                    <router-link to="/login" class="nav-item nav-link"
                        >Login</router-link
                    >
                    <router-link to="/register" class="nav-item nav-link"
                        >Register
                    </router-link>
                </div>
</div>
</nav>
<router-view/>
        
    </div>
</template>

<script>
export default {
    name:'Home',
    data() {
        return {
            user: {},
            isLoggedIn: false,
            token: localStorage.getItem("token"),
            errorMessage: null
        };
    },
    mounted() {
        // if(this.token !== null){
        //     this.getToken();
        //     this.isLoggedIn = true
        // }
        // else{
        //     this.errorMessage = "User has not yet logged in";
        // }
    },
    methods: {
        getToken() {
            axios.defaults.headers.common[
                "Authorization"
            ] = `Bearer ${this.token}`;
            axios
                .get("/api/user")
                .then((response) => {
                })
                .catch((errors) => {
                    console.log(errors);
                });
        },
    },
    logout(e) {
            e.preventDefault()
                axios.post('/api/logout')
                    .then(response => {
                        localStorage.removeItem('token');
                        if (response.data.success) {
                            console.log(response)
                            window.location.href = "/login"
                        } else {
                            console.log(response)
                        }
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            
        }
};
</script>
