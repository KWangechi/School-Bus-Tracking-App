import axios from "axios";
import { ElMessage } from "element-plus";
const state = {
    // isLoggedIn: false,
    user: {},
    errorMessage: null,
    driverToken: null,
    adminToken: null,
    parentToken: null
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

                localStorage.setItem("token", response.data.access_token);
                localStorage.setItem("isLoggedIn", true);

                state.user = response.data.data;

                if (response.data.success && response.data.data.role_id == 1) {
                    window.location.href = "/dashboard";
                } else if (
                    response.data.success &&
                    response.data.data.role_id == 2
                ) {
                    window.location.href = "/driver";
                } else if (
                    response.data.success &&
                    response.data.data.role_id == 3
                ) {
                    window.location.href = "/parent";
                } else {
                    state.errorMessage = response.data.message;
                }

                axios.defaults.headers.common["Authorization"] =
                    "Bearer " + response.data.access_token;
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

        localStorage.setItem("isLoggedIn", false);
    },

    SET_USER(state) {
        let token = localStorage.getItem("token");
        let login = localStorage.getItem("isLoggedIn");

        return token && login ? true : false;
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
