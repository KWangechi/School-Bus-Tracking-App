<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div
                    class="alert alert-danger"
                    role="alert"
                    v-if="errorMessage !== null"
                >
                    {{ errorMessage }}
                </div>

                <div class="card card-default">
                    <div class="card-header">Login</div>
                    <div class="card-body">
                        <form>
                            <div class="form-group row">
                                <label
                                    for="email"
                                    class="
                                        col-sm-4 col-form-label
                                        text-md-right
                                    "
                                    >E-Mail Address</label
                                >
                                <div class="col-md-6">
                                    <input
                                        id="email"
                                        type="email"
                                        class="form-control"
                                        v-model="user.email"
                                        required
                                        autofocus
                                        autocomplete="off"
                                    />
                                </div>
                            </div>
                            <br />

                            <div class="form-group row">
                                <label
                                    for="password"
                                    class="
                                        col-md-4 col-form-label
                                        text-md-right
                                    "
                                    >Password</label
                                >
                                <div class="col-md-6">
                                    <input
                                        id="password"
                                        type="password"
                                        class="form-control"
                                        v-model="user.password"
                                        required
                                        autocomplete="off"
                                    />
                                </div>
                            </div>
                            <br />
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                        @click="handleSubmit"
                                    >
                                        Login
                                    </button>
                                </div>
                            </div>
                            <br />
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <p>
                                        Don't have an account?
                                        <router-link
                                            to="/register"
                                            class="nav-item nav-link"
                                            >Register</router-link
                                        >
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:'Login',
    data() {
        return {
            user:{
            email: "",
            password: ""
            },
            
            errorMessage: null,
        };
    },
    methods: {
        handleSubmit(e) {
            e.preventDefault();
            if (this.user.password.length > 0 && this.user.email != null) {
                axios
                    .post("/api/login", this.user)
                    .then((response) => {
                        localStorage.setItem(
                            "token",
                            response.data.access_token
                        );
                        if (response.data.success && response.data.data.role_id == 1) {
                            window.location.href = "/dashboard";
                        } 
                        else if(response.data.success && response.data.data.role_id == 2){
                            window.location.href = "/driver"
                            }
                            else if(response.data.success && response.data.data.role_id == 3){
                                window.location.href = "/parent"
                            }
                            else {
                            this.errorMessage = response.data.message;
                        }
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            }
        },
        
    },
    
};
</script>
