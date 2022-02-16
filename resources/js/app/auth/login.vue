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
import { mapGetters } from "vuex";
export default {
    data() {
        return {
            user: {},
        };
    },
    computed:{
        ...mapGetters({
            errorMessage: "errorMessage"
        })
    },
    methods: {
        handleSubmit(e) {
            e.preventDefault();

            this.$store.commit("LOGIN_USER", this.user);
        },
    },

    mounted(){
        let login = localStorage.getItem("isLoggedIn")
        console.log("Login status: " + login)

        if(login == true){
            login = localStorage.setItem("isLoggedIn", false)
        }

        console.log("After clearing login: " + login)
        console.log(this.user)
        // console.log(localStorage.getItem('token'))
    }

};
</script>
