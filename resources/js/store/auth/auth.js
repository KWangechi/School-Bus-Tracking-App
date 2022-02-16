import axios from "axios";
import { ElMessage } from "element-plus";
const state = {
    // isLoggedIn: false,
    user: {},
    errorMessage: null,
    // driverToken: null,
    // adminToken: null,
    // parentToken: null,
};

const getters = {
    // isLoggedIn: (state) => state.isLoggedIn,
    user: (state) => state.user,
    errorMessage: (state) => state.errorMessage,
};

const mutations = {
    LOGIN_USER(state, user) {
        axios
            .post("/api/login", user)
            .then((response) => {

                //response must be a success
                if(response.data.success){
                    localStorage.setItem("token", response.data.access_token);
                    localStorage.setItem("isLoggedIn", true);
                    ElMessage({
                        type: 'success',
                        message: 'Successfully logged in'
                    })

                    state.user = response.data.data;


                    if (response.data.data.role_id == 1) {
                        window.location.href = "/admin";
                    } else if (response.data.data.role_id == 2
                    ) {
                        window.location.href = "/driver";
                    } else {
                        window.location.href = "/parent";
                    }

                    axios.defaults.headers.common["Authorization"] =
                        "Bearer " + response.data.access_token;
                }

                else{
                    state.errorMessage = response.data.message;
                    localStorage.clear();
                }
            })
            .catch(function (error) {
                console.error(error);
            });
    },

    LOGOUT_USER(state) {
        axios.defaults.headers.common["Authorization"] =
            "Bearer " + localStorage.getItem("token");
        axios
            .post("/api/logout")
            .then((response) => {
                localStorage.removeItem("token");
                localStorage.setItem("isLoggedIn", false);
                if (response.data.success) {
                    window.location.href = "/login";
                    ElMessage({
                        message: "Successfully logged out",
                        type: "success",
                    });
                } else {
                    console.log(response);
                }
            })
            .catch(function (error) {
                console.error(error);
            });

    },

    SET_USER(state) {
        let token = localStorage.getItem("token");
        // let login = localStorage.getItem("isLoggedIn");

        return token ? true : false;
    },

    GET_USER(state) {
        axios.defaults.headers.common["Authorization"] =
            "Bearer " + localStorage.getItem("token");
        axios
            .get("/api/user")
            .then((response) => {
                localStorage.getItem("token");
                state.user = response.data;
            })
            .catch((errors) => {
                console.log(errors);
            });
    },
};

const actions = {};

export default {
    state,
    getters,
    mutations,
    actions,
};
