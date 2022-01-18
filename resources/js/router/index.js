import { createRouter, createWebHistory } from 'vue-router'

import Register from '../app/auth/register';
import Login from '../app/auth/login';
import Dashboard from '../app/admin/dashboard';
import Home from '../app/auth/index';

//admin routes
import AdminDriver from  '../app/admin/driver';
import AdminParent from '../app/admin/parent'
import AdminBus from '../app/admin/bus'

//admin driver routes
import AdminDriverCreate from '../app/admin/driver/create'


//driver routes
import Driver from '../app/driver/index'
import MapComponent from '../app/driver/map'
import NewMapComponent from '../app/driver/newMap'

import Profile from '../app/driver/profile'
import Notification from '../app/driver/notifications/index'
import Unread from '../app/driver/notifications/unread'
import Read from '../app/driver/notifications/read'


//parent pages
import Parent from '../app/parent/index'
import ParentMap from '../app/parent/map'
import ParentProfile from '../app/parent/profile'
import ParentNotification from '../app/parent/notifications/index'
import ParentUnread from '../app/parent/notifications/unread'
import ParentRead from '../app/parent/notifications/read'
import ChildProfile from '../app/parent/child_profile'


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

        // driver routes
        {
            path: '/driver',
            component: Driver,
            children:[
                {
                    path: 'map',
                    component: MapComponent
                },
                {
                    path: 'newmap',
                    component: NewMapComponent
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

        //parent routes
        {
            path: '/parent',
            component: Parent,
            children: [
                {
                    path: 'map',
                    component: ParentMap
                },
                {
                    path: 'profile',
                    component: ParentProfile
                },
                {
                    path: 'child',
                    component: ChildProfile
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

//admin Routes
// {
//     path:'/admin',
//     component: AdminDriver,
//     children:[
//         {
//             path:'driver',
//             component: AdminDriver,
//             children:[
//                 { 
//                     path:'create',
//                     component: AdminDriverCreate,
//                 },
//                 {

//                 },
//                 { 

//                 }
//             ]
//         },
//         {
//             path:'bus',
//             component: AdminBus,
//         },
//         { 
//             path: 'parent',
//             component: AdminParent
//         }
//         // {
//             //     name: 'bus',
//             //     path: '/buses',
//             //     component: Bus
//             // },
//             // {
//             //     name: 'drivers',
//             //     path: '/drivers',
//             //     component: DriversIndex
//             // },
//     ]
// }
    ]


});

export default router;
