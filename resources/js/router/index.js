import { createRouter, createWebHistory } from 'vue-router'

import Register from '../app/auth/register';
import Login from '../app/auth/login';
import Dashboard from '../app/admin/dashboard';
import Home from '../app/auth/index';

//admin pages
import DriversIndex from  '../app/admin/driver';
import Parent from '../app/admin/parent'
import Bus from '../app/admin/bus'


//driver pages
import Driver from '../app/driver/index'
import MapComponent from '../app/driver/map'
import Profile from '../app/driver/profile'
import Notification from '../app/driver/notifications/index'
import Unread from '../app/driver/notifications/unread'
import Read from '../app/driver/notifications/read'


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

        //admin pages
        {
            name: 'parent',
            path: '/parents',
            component: Parent
        },

        {
            name: 'bus',
            path: '/buses',
            component: Bus
        },
        {
            name: 'drivers',
            path: '/drivers',
            component: DriversIndex
        },
        
        

    ]
});

export default router;
