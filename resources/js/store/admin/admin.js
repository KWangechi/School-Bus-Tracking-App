import axios from "axios";
import { ElMessage } from "element-plus";

const state = {
    buses: {},
    drivers: {},
    parents: {},
    children: {},
    bus: {},
    admin_driver: {},
    admin_parent: {},
    child: {},
    users: {},
};
const getters = {
    buses: (state) => state.buses,
    drivers: (state) => state.drivers,
    parents: (state) => state.parents,
    children: (state) => state.children,
    bus: (state) => state.bus,
    admin_driver: (state) => state.driver,
    admin_parent: (state) => state.parent,
    child: (state) => state.child,
    users: (state) => state.users,
};

const mutations = {
    //buses api
    GET_BUSES(state) {
        axios.defaults.headers.common["Authorization"] =
            "Bearer " + localStorage.getItem("token");
        axios
            .get("/api/buses")
            .then((response) => {
                state.buses = response.data.data;
            })
            .catch((error) => {
                console.log(error);
            });
    },

    CREATE_BUS(state, bus) {
        axios.defaults.headers.common["Authorization"] =
            "Bearer " + localStorage.getItem("token");
        axios
            .post("/api/bus", bus)
            .then((response) => {
                console.log(response);
                state.bus = response.data.data;
                ElMessage({
                    message: "Bus created successfully!",
                    type: "success",
                });
            })
            .catch((errors) => {
                console.log(errors);
            });
    },

    GET_DRIVERS(state) {
        axios.defaults.headers.common["Authorization"] =
            "Bearer " + localStorage.getItem("token");

        axios
            .get("/api/drivers")
            .then((response) => {
                console.log(response);
                state.drivers = response.data.data;
            })
            .catch((errors) => {
                console.log(errors);
            });
    },

    GET_USERS(state) {
        axios.defaults.headers.common["Authorization"] =
            "Bearer " + localStorage.getItem("token");

        axios
            .get("/api/users")
            .then((response) => {
                console.log(response);
                state.users = response.data.data;
            })
            .catch((errors) => {
                console.log(errors);
            });
    },

    GET_PARENTS(state) {
        axios.defaults.headers.common["Authorization"] =
        "Bearer " + localStorage.getItem("token");
        axios
            .get("/api/parents")
            .then((response) => {
                state.parents = response.data.data
                console.log(response);
            })
            .catch((errors) => {
                console.log(errors);
            });
    },

    GET_CHILDREN(state){
        axios.defaults.headers.common["Authorization"] =
        "Bearer " + localStorage.getItem("token");

        axios.get('/api/child').then((response) => {
            console.log(response);
            state.children = response.data.data
        }).catch((errors) => {
            console.log(errors);
        })
    },
};
const actions = {};

export default { state, getters, mutations, actions };
