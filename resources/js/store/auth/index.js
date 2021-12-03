import axios from 'axios';
// import { Message } from 'element-ui';


const state = {
    loggingin: false,
};

const getters = {
    loggingin: state => state.loggingin,
    
};

const mutations = {

    LOGIN_USER(state, user) {

        state.loggingin = true;

        axios.post('/api/login',user)
            .then( ({ data }) => {

                console.log(data);

    

                    state.loggingin = false;

                    authUser.login(data);
                    
                    location.replace('/home');

                 {
                    Message.warning({ message: 'Error occured!'});
                }
            }, () => {
                state.loggingin = false;
                Message.warning({ message: 'Login failed, email or password is incorrect!'});
            });
    },

      }
;

export default {
    state, getters, mutations
}
