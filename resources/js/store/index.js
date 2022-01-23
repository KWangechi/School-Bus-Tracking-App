// import { createApp } from 'vue'
import { createStore } from 'vuex'

import Auth from './auth/auth'
import Driver from './driver/driver'
import Parent from './parent/parent'
import Admin from './admin/admin'

const store = createStore({
modules:{
    Auth,
    Driver,
    Parent,
    Admin
}
})

export default store




