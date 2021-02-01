import Vue from "vue";
import vuex from "vuex";

Vue.use(vuex);

export default new vuex.Store({
    state: {
        errors: {},
        user: {}
    },
    getters: {
        errors: state => name => state.errors[name] && state.errors[name][0],
        auth() {
            return Boolean(localStorage.getItem("token"));
        },
        token() {
            return window.localStorage.getItem("token");
        }
    },
    //修改数据时使用，这是一个同步方法，不能在这里执行异步动作
    mutations: {
        //设置验证错误
        setErrors(state, { errors }) {
            state.errors = errors;
        },
        setUser(state, user) {
            state.user = user;
        }
    },
    //用来执行异步动作
    actions: {
        async getUserInfo({ commit }) {
            commit("setUser", await axios.get(`user/info`));
        }
    }
});
