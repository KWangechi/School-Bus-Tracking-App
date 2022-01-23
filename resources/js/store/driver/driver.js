import axios from "axios";
import store from "./../index";
import Swal from "sweetalert2";
import { ElMessage } from "element-plus";
import {Html5QrcodeScanner} from "html5-qrcode"
import {Html5Qrcode} from "html5-qrcode"


const state = {
    driver_inbox: {},
    driver: {},
    driver_notifications: {},
    driver_message: null,
};

const getters = {
    driver_inbox: (state) => state.driver_inbox,
    driver: (state) => state.driver,
    driver_notifications: (state) => state.driver_notifications,
    driver_message: (state) => state.driver_message,
};

const mutations = {
    GET_ALL_DRIVER_NOTIFICATIONS(state) {
        axios.defaults.headers.common["Authorization"] =
            "Bearer " + localStorage.getItem("token");

        axios
            .get("/api/driver/notifications/all")
            .then((response) => {
                state.driver_notifications = response.data.data; 
            })
            .catch((errors) => {
                console.log(errors)
            });
    },

    GET_DRIVER_INBOX(state) {
        axios.defaults.headers.common["Authorization"] =
            "Bearer " + localStorage.getItem("token");

        axios
            .get("/api/driver/notifications/inbox")
            .then((response) => {
                state.driver_inbox = response.data.data;
                console.log(state.driver_inbox);
            })
            .catch((errors) => {
                console.log(errors);
            });
    },

        MARK_ALL_DRIVER_AS_READ(state, driver_inbox) {
        axios
            .post("/api/driver/markAllNotifications", driver_inbox)
            .then((response) => {
                console.log(response);
                if (response.data.success) {
                    ElMessage({
                        showClose: true,
                        message: "All inbox marked as read",
                        type: "success",
                    });
                    store.commit("GET_DRIVER_INBOX");
                } else {
                    state.driver_message = "Something went wrong! Please try again";
                }
            })
            .catch((errors) => {
                console.log(errors);
            });
    },
    GET_DRIVER(state) {
        axios.defaults.headers.common["Authorization"] =
            "Bearer " + localStorage.getItem("token");

        axios
            .get("/api/driver")
            .then((response) => {
                state.driver = response.data.data;
            })
            .catch((errors) => {
                console.log(errors);
            });
    },

    READ_DRIVER_NOTIFICATION(state, driver_notification) {
        axios
            .post("/api/driver/markNotification", driver_notification)
            .then((response) => {
                console.log(response);
                if (response.data.success) {
                    store.commit("GET_DRIVER_INBOX");
                    ElMessage({
                        showClose: true,
                        message: "Message read successfully!!",
                        type: "success",
                    });
                } else {
                    state.driver_message = "Something went wrong! Please try again";
                }
            })
            .catch((errors) => {
                console.log(errors);
            });

    },

    DELETE_DRIVER_NOTIFICATION(state, id) {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.isConfirmed) {
                axios
                    .delete("/api/driver/deleteNotification/" + id)
                    .then((response) => {
                        if (response.data.success) {
                            console.log(response);
                            Swal.fire(
                                "Deleted!",
                                "Notification has been deleted",
                                "success"
                            );

                            store.commit("GET_ALL_DRIVER_NOTIFICATIONS");
                        } else {
                            state.driver_message = response.data.message;
                        }
                    })
                    .catch((errors) => {
                        console.log(errors);
                    });
            }
        });
    },

    DELETE_ALL_DRIVER_NOTIFICATIONS(state, driver_notifications) {
        axios
            .post("/api/driver/deleteAllNotifications", driver_notifications)
            .then((response) => {
                console.log(response);
                if (response.data.success) {
                    ElMessage({
                        showClose: true,
                        message: "Notifications successfully deleted!!",
                        type: "success",
                    });
                    store.commit("GET_ALL_DRIVER_NOTIFICATIONS");
                } else {
                    ElMessage({
                        showClose: true,
                        message:
                            "Ooops, something went wrong. Please try again",
                        type: "error",
                    });
                }
            });
    },

    SEND_NOTIFICATION(state) {
        axios
            .post("/api/driver/send-notification")
            .then((response) => {
                ElMessage({
                    type: "success",
                    message: "Notification sent successfully!!!"
                })
                console.log(response)

            })
            .catch((errors) => {
                // console.log(errors);
                ElMessage({
                    type: "success",
                    message: "Error sending notification!!"
                })
                console.log("Notification has not been sent!!")
            });
    },

    DELETE_DRIVER_INBOX(state, driver_inbox) {
        axios.post("/api/driver/deleteInbox", driver_inbox).then((response) => {
            console.log(response);
            if (response.data.success) {
                ElMessage({
                    showClose: true,
                    message: "Inbox deleted successfully!!",
                    type: "success",
                });
                store.commit("GET_DRIVER_INBOX");
            } else {
                ElMessage({
                    showClose: true,
                    message: "Ooops, something went wrong. Please try again",
                    type: "error",
                });
            }
        });
    },

    DESTINATION_REACHED(state) {
        axios
            .post("/api/driver/destinationReached")
            .then((response) => {
                console.log(response)
                ElMessage({
                    showClose: true,
                    message: "Destination arrived and notification sent successfully!!",
                    type: "success",
                });
            })
            .catch((errors) => {
                console.log(errors);
            });

    },

SCAN_QRCODE(state){
    Html5Qrcode.getCameras().then(devices => {
        /**
         * devices would be an array of objects of type:
         * { id: "id", label: "label" }
         */
        if (devices && devices.length) {
          var cameraId = devices[0].id;
          
          //second argument shows verbose
          const html5QrCode = new Html5Qrcode("reader", true);

          // .. use this to start scanning
          html5QrCode.start(cameraId, 
            {
              fps: 10,    // Optional, frame per seconds for qr code scanning
              qrbox: { width: 250, height: 250 }  // Optional, if you want bounded box UI
            },
            (decodedText, decodedResult) => {
              // do something when code is read
              console.log('QR Code already scanned!!')


            //   console.log(decodedText)
            //   console.log(decodedResult);
            },
            (errorMessage) => {
              // parse error, ignore it.
              console.log(errorMessage)
            })
          .catch((err) => {
            // Start failed, handle it.
            console.log('Scanning error: ' + err);
          });

        }
      }).catch(errors => {
        console.log(errors)
      });
},

};

export default {
    mutations,
    getters,
    state,
};
