import VueRouter from 'vue-router';
import Vue from 'vue'

Vue.use(VueRouter);

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
import Notification from '../app/driver/notifications'


const router = new VueRouter({

    mode: 'history',

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
            name: 'driver',
            path: '/driver',
            component: Driver
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
        {
            name: 'map',
            path: '/map',
            component: MapComponent
        },
        {
            name: 'profile',
            path: '/profile',
            component: Profile
        },

        {
            name: 'notifications',
            path: '/notifications',
            component: Notification
        },

    ]
});


export default router;
