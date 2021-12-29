import { createRouter, createWebHistory } from 'vue-router'

import Register from '../app/auth/register';
import Login from '../app/auth/login';
import Dashboard from '../app/admin/dashboard';
import Home from '../app/auth/index';

//admin pages
import AdminDriver from  '../app/admin/driver';
import AdminParent from '../app/admin/parent'
import AdminBus from '../app/admin/bus'


//driver pages
import Driver from '../app/driver/index'
import MapComponent from '../app/driver/map'
import Profile from '../app/driver/profile'
import Notification from '../app/driver/notifications/index'
import Unread from '../app/driver/notifications/unread'
import Read from '../app/driver/notifications/read'

//parent pages
import Parent from '../app/parent/index'
// import ParentMapComponent from '../app/parent/map'
import ParentProfile from '../app/parent/profile'
import ParentNotification from '../app/parent/notifications/index'
import ParentUnread from '../app/parent/notifications/unread'
import ParentRead from '../app/parent/notifications/read'


const router = createRouter({

   history: createWebHistory(),
    linkActiveClass: "active",
    linkExactActiveClass: "exact-active",

    routes : [
        {
            name: 'register',
            path: '/register',
            component: Register
        },
        {
            name: 'login',
            path: '/login',
            component: Login
        },
        {
            name: 'dashboard',
            path: '/dashboard',
            component: Dashboard
        },

        {
            name: 'home',
            path: '/',
            component: Home
        },

        // driver pages
        {
            path: '/driver',
            component: Driver,
            children:[
                {
                    path: 'map',
                    component: MapComponent
                },
                {
                    path: 'profile',
                    component: Profile
                },
        
                {
                    path: 'notifications',
                    component: Notification,
                    children: [
                        {
                            path: 'all',
                            component: Read
                        },

                        {
                            path: 'inbox',
                            component: Unread
                        },
                    ]
                },
            ]
        },

        //parent
        {
            path: '/parent',
            component: Parent,
            children: [
                // {
                //     path: 'map',
                //     component: MapComponent
                // },
                {
                    path: 'profile',
                    component: ParentProfile
                },
        
                {
                    path: 'notifications',
                    component: ParentNotification,
                    children: [
                        {
                            path: 'all',
                            component: ParentRead
                        },

                        {
                            path: 'inbox',
                            component: ParentUnread
                        },
            ],
        },
    ]
},

        // {
        //     name: 'bus',
        //     path: '/buses',
        //     component: Bus
        // },
        // {
        //     name: 'drivers',
        //     path: '/drivers',
        //     component: DriversIndex
        // },
        
    ]
});

export default router;
