// import axios from "axios";
// import store from "./../index";
// import Swal from "sweetalert2";
// import { ElMessage } from "element-plus";

// const state = {
//     inbox: {},
//     driver: {},
//     notifications: {},
//     message: null,
// };

// const getters = {
//     inbox: (state) => state.inbox,
//     driver: (state) => state.driver,
//     notifications: (state) => state.notifications,
//     message: (state) => state.message,
// };

// const mutations = {
//     GET_ALL_NOTIFICATIONS(state) {
//         axios.defaults.headers.common["Authorization"] =
//             "Bearer " + localStorage.getItem("token");
//         axios
//             .get("/api/driver/notifications/all")
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
//             .get("/api/driver/notifications/inbox")
//             .then((response) => {
//                 state.inbox = response.data.data;
//                 console.log(state.inbox);
//             })
//             .catch((errors) => {
//                 console.log(errors);
//             });
//     },
//     GET_DRIVER(state) {
//         axios.defaults.headers.common["Authorization"] =
//             "Bearer " + localStorage.getItem("token");

//         axios
//             .get("/api/driver")
//             .then((response) => {
//                 state.driver = response.data.data;
//             })
//             .catch((errors) => {
//                 console.log(errors);
//             });
//     },

//     READ_NOTIFICATION(state, notification) {
//         axios
//             .post("/api/driver/markNotification", notification)
//             .then((response) => {
//                 console.log(response);
//                 if (response.data.success) {
//                     console.log("Message should be marked as read");
//                     store.commit("GET_INBOX");
//                     ElMessage({
//                         showClose: true,
//                         message: "Message read successfully!!",
//                         type: "success",
//                     });
//                 } else {
//                     state.message = "Something went wrong! Please try again";
//                 }
//             })
//             .catch((errors) => {
//                 console.log(errors);
//             });

//         console.log(notification);
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
//                     .delete("/api/driver/deleteNotification/" + id)
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
//                             // console.log('Something has gone horribly wrong!!!')
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
//             .post("/api/driver/deleteAllNotifications", notifications)
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
//             .post("/api/driver/send-notification")
//             .then((response) => {
//                 console.log("Notification successfully sent!!!" + response);
//             })
//             .catch((errors) => {
//                 console.log(errors);
//             });
//     },

//     DELETE_INBOX(state, inbox){
//         axios
//             .post("/api/driver/deleteInbox", inbox)
//             .then((response) => {
//                 console.log(response);
//                 if (response.data.success) {
//                     ElMessage({
//                         showClose: true,
//                         message: "Inbox deleted successfully!!",
//                         type: "success",
//                     });
//                     store.commit("GET_INBOX");
//                 } else {
//                     ElMessage({
//                         showClose: true,
//                         message: "Ooops, something went wrong. Please try again",
//                         type: "error",
//                     });
//                 }
//             });
//     }
// };

// export default {
//     mutations,
//     getters,
//     state,
// };
