// import { createApp } from 'vue'
import { createStore } from 'vuex'

import Auth from './auth/auth'
import Driver from './driver/driver'
import Parent from './parent/parent'

const store = createStore({
modules:{
    Auth,
    Driver,
    Parent
}
})

export default store




