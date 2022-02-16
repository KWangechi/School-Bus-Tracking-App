import { createRouter, createWebHistory } from "vue-router";

import Register from "../app/auth/register";
import Login from "../app/auth/login";
import AdminDashboard from "../app/admin/dashboard";
import Users from "../app/admin/users";
import Home from "../app/auth/index";

//admin routes
import AdminDriver from "../app/admin/driver/table";
import AdminParent from "../app/admin/parent/table";
import AdminBus from "../app/admin/bus/table";
import AdminChildren from "../app/admin/parent/child_table";
import AdminProfile from "../app/admin/profile";

//admin driver routes
import AdminDriverCreate from "../app/admin/driver/create";

//driver routes
import Driver from "../app/driver/index";
import MapComponent from "../app/driver/map";
// import NewMapComponent from "../app/driver/newMap";

import Profile from "../app/driver/profile";
import Notification from "../app/driver/notifications/index";
import Unread from "../app/driver/notifications/unread";
import Read from "../app/driver/notifications/read";
import ScanQrCode from '../app/driver/scanQrCode'
import GenerateQrCode from '../app/driver/generateQrCode'

//parent pages
import Parent from "../app/parent/index";
import ParentMap from "../app/parent/map";
import ParentProfile from "../app/parent/profile";
import ParentNotification from "../app/parent/notifications/index";
import ParentUnread from "../app/parent/notifications/unread";
import ParentRead from "../app/parent/notifications/read";
import ChildProfile from "../app/parent/child_profile";
import { ElMessage } from "element-plus";

const router = createRouter({
    history: createWebHistory(),
    linkActiveClass: "active",
    linkExactActiveClass: "exact-active",

    routes: [
        {
            name: "register",
            path: "/register",
            component: Register,
        },
        {
            name: "login",
            path: "/login",
            component: Login,
        },
        {
            name: "home",
            path: "/",
            component: Home,
        },

        // driver routes
        {
            path: "/driver",
            component: Driver,
            children: [
                {
                    path: "map",
                    component: MapComponent,
                },
                {
                    path: "profile",
                    component: Profile,
                },

                {
                    path: "notifications",
                    component: Notification,
                    children: [
                        {
                            path: "all",
                            component: Read,
                        },

                        {
                            path: "inbox",
                            component: Unread,
                        },
                    ],
                },
                {
                    path: 'scanQrCode',
                    component: ScanQrCode
                },
                {
                    path: 'generateQrCode',
                    component: GenerateQrCode
                }
            ],
            beforeEnter: (to, from, next) => {
                if (localStorage.getItem("token") == null) {
                    window.location.href = "/login";
                    ElMessage({
                        type: "error",
                        message: "You are not logged in!!!",
                    });
                } else {
                    next();
                }
            },
        },

        //parent routes
        {
            path: "/parent",
            component: Parent,
            children: [
                {
                    path: "map",
                    component: ParentMap,
                },
                {
                    path: "profile",
                    component: ParentProfile,
                },
                {
                    path: "child",
                    component: ChildProfile,
                },

                {
                    path: "notifications",
                    component: ParentNotification,
                    children: [
                        {
                            path: "all",
                            component: ParentRead,
                        },

                        {
                            path: "inbox",
                            component: ParentUnread,
                        },
                    ],
                },
            ],
            beforeEnter: (to, from, next) => {
                if (localStorage.getItem("token") == null) {
                    window.location.href = "/login";
                    ElMessage({
                        type: "error",
                        message: "You are not logged in!!!",
                    });
                } else {
                    next();
                }
            },
        },

        // admin Routes
        {
            path: "/admin",
            component: AdminDashboard,
            children: [
                {
                    path: "drivers",
                    component: AdminDriver,
                    children: [
                        {
                            path: "create",
                            component: AdminDriverCreate,
                        },
                    ],
                },
                {
                    path: "buses",
                    component: AdminBus,
                },
                {
                    path: "parents",
                    component: AdminParent,
                },
                {
                    path: "users",
                    component: Users,
                },
                {
                    path: "children",
                    component: AdminChildren,
                },
                {
                    path: "profile",
                    component: AdminProfile,
                },
            ],
            beforeEnter: (to, from, next) => {
                if (
                    localStorage.getItem("token") == null) {
                    ElMessage({
                        type: "error",
                        message: "You are not logged in!!!",
                    });
                    window.location.href = "/login";
                } else {
                    next();
                }
            },
        },
    ],
});

export default router;
