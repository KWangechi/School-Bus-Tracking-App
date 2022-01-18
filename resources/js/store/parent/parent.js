// import axios from "axios";
// import store from "./../index";
// import Swal from "sweetalert2";
// import { ElMessage } from "element-plus";

// const state = {
//     inbox: {},
//     guardian: {},
//     notifications: {},
//     message: null,
//     children: {},
//     driverLocation: "",
// };

// const getters = {
//     inbox: (state) => state.inbox,
//     guardian: (state) => state.guardian,
//     notifications: (state) => state.notifications,
//     message: (state) => state.message,
//     children: (state) => state.children,
//     driverLocation: state => state.driverLocation
// };

// const mutations = {
//     GET_ALL_NOTIFICATIONS(state) {
//         axios.defaults.headers.common["Authorization"] =
//             "Bearer " + localStorage.getItem("token");
//         axios
//             .get("/api/parent/notifications/all")
//             .then((response) => {
//                 state.notifications = response.data.data;
//             })
//             .catch((errors) => {
//                 console.log(errors);
//             });
//     },

//     GET_INBOX(state) {
//         axios.defaults.headers.common["Authorization"] =
//             "Bearer " + localStorage.getItem("token");
//         axios
//             .get("/api/parent/notifications/inbox")
//             .then((response) => {
//                 state.inbox = response.data.data;
//                 console.log(state.inbox);
//             })
//             .catch((errors) => {
//                 console.log(errors);
//             });
//     },
//     GET_GUARDIAN(state) {
//         axios.defaults.headers.common["Authorization"] =
//             "Bearer " + localStorage.getItem("token");

//         axios
//             .get("/api/parent")
//             .then((response) => {
//                 state.guardian = response.data.data;
//             })
//             .catch((errors) => {
//                 console.log(errors);
//             });
//     },

//     READ_NOTIFICATION(state, notification) {
//         axios
//             .post("/api/parent/markNotification", notification)
//             .then((response) => {
//                 console.log(response);
//                 if (response.data.success) {
//                     ElMessage({
//                         showClose: true,
//                         message: "Message read successfully!!",
//                         type: "success",
//                     });
//                     store.commit("GET_INBOX");
//                 } else {
//                     state.message = "Something went wrong! Please try again";
//                 }
//             })
//             .catch((errors) => {
//                 console.log(errors);
//             });
//     },

//     MARK_ALL_AS_READ(state, inbox) {
//         axios
//             .post("/api/parent/markAllNotifications", inbox)
//             .then((response) => {
//                 console.log(response);
//                 if (response.data.success) {
//                     ElMessage({
//                         showClose: true,
//                         message: "All inbox marked as read",
//                         type: "success",
//                     });
//                     store.commit("GET_INBOX");
//                 } else {
//                     state.message = "Something went wrong! Please try again";
//                 }
//             })
//             .catch((errors) => {
//                 console.log(errors);
//             });
//     },

//     DELETE_NOTIFICATION(state, id) {
//         Swal.fire({
//             title: "Are you sure?",
//             text: "You won't be able to revert this!",
//             icon: "warning",
//             showCancelButton: true,
//             confirmButtonColor: "#3085d6",
//             cancelButtonColor: "#d33",
//             confirmButtonText: "Yes, delete it!",
//         }).then((result) => {
//             if (result.isConfirmed) {
//                 axios
//                     .delete("/api/parent/deleteNotification/" + id)
//                     .then((response) => {
//                         if (response.data.success) {
//                             console.log(response);
//                             Swal.fire(
//                                 "Deleted!",
//                                 "Notification has been deleted",
//                                 "success"
//                             );

//                             store.commit("GET_ALL_NOTIFICATIONS");
//                         } else {
//                             state.message = response.data.message;
//                         }
//                     })
//                     .catch((errors) => {
//                         console.log(errors);
//                     });
//             }
//         });
//     },

//     DELETE_ALL_NOTIFICATIONS(state, notifications) {
//         axios
//             .post("/api/parent/deleteAllNotifications", notifications)
//             .then((response) => {
//                 console.log(response);
//                 if (response.data.success) {
//                     ElMessage({
//                         showClose: true,
//                         message: "Notifications successfully deleted!!",
//                         type: "success",
//                     });
//                     store.commit("GET_ALL_NOTIFICATIONS");
//                 } else {
//                     ElMessage({
//                         showClose: true,
//                         message:
//                             "Ooops, something went wrong. Please try again",
//                         type: "error",
//                     });
//                 }
//             });
//     },

//     SEND_NOTIFICATION(state) {
//         axios
//             .post("/api/parent/send-notification")
//             .then((response) => {
//                 console.log("Notification successfully sent!!!" + response);
//             })
//             .catch((errors) => {
//                 console.log(errors);
//             });
//     },

//     DELETE_INBOX(state, inbox) {
//         axios.post("/api/parent/deleteInbox", inbox).then((response) => {
//             console.log(response);
//             if (response.data.success) {
//                 ElMessage({
//                     showClose: true,
//                     message: "Inbox deleted successfully!!",
//                     type: "success",
//                 });
//                 store.commit("GET_INBOX");
//             } else {
//                 ElMessage({
//                     showClose: true,
//                     message: "Ooops, something went wrong. Please try again",
//                     type: "error",
//                 });
//             }
//         });
//     },


//     GET_CHILD(state) {
//         axios.defaults.headers.common["Authorization"] =
//             "Bearer " + localStorage.getItem("token");

//         axios.get("/api/parent/child").then((response) => {
//             console.log(response);

//             //check to see if the results are okay
//             if(response.data.success){
//                 state.children = response.data.data
//             }
//             else{
//                 state.message = response.data.message
//             }

//         });
//     },
// };

// export default {
//     mutations,
//     getters,
//     state,
// };
