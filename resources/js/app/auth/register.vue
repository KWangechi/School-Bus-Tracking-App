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
                    <div class="card-header">Register</div>
                    <div class="card-body">
                        <form>
                            <div class="form-group row">
                                <label
                                    for="name"
                                    class="
                                        col-sm-4 col-form-label
                                        text-md-right
                                    "
                                    >Name</label
                                >
                                <div class="col-md-6">
                                    <input
                                        id="name"
                                        type="text"
                                        class="form-control"
                                        v-model="user.name"
                                        required
                                        autofocus
                                        autocomplete="off"
                                    />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <input
                                    id="role_id"
                                    type="number"
                                    value="3"
                                    v-model="user.role_id"
                                    hidden
                                    class="form-control"
                                    required
                                    autofocus
                                    autocomplete="off"
                                />
                            </div>
                            <br />

                            <div class="form-group row">
                                <label
                                    for="phone"
                                    class="
                                        col-sm-4 col-form-label
                                        text-md-right
                                    "
                                    >Phone Number</label
                                >
                                <div class="col-md-6">
                                    <input
                                        id="phone_number"
                                        type="number"
                                        class="form-control"
                                        v-model="user.phone_number"
                                        required
                                        autofocus
                                        autocomplete="off"
                                    />
                                </div>
                            </div>
                            <br />
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
                                        @click="register"
                                    >
                                        Register
                                    </button>
                                </div>
                            </div>
                            <br />
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <p>
                                        Already have an account?
                                        <router-link
                                            to="login"
                                            class="nav-item nav-link"
                                            >Login Here</router-link
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
    name: 'Register',
    data() {
        return {
            user:{
            role_id: 3,
            name: "",
            phone_number: "",
            email: "",
            password: "",
            },
            errorMessage: null,
            
        };
    },
    methods: {
        register(e) {
            e.preventDefault();
            if (
                this.user.password.length > 0 &&
                this.user.email != null &&
                this.user.name != null &&
                this.user.phone_number != null
            ) {

                    axios.post("/api/register", 
                            this.user
                        )
                        .then((response) => {
                            localStorage.setItem('token', response.data.access_token)
                            console.log(response);
                            if (response.data.success) {
                                this.$router.go('/dashboard')
                            } else {
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
