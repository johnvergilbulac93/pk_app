import http from "./../../axios";
import router from "./../../router";

export default {
  namespaced: true,
  state: {
    users: [],
    status: "loading",
  },
  actions: {
    async login({ commit }, payload) {
      const { status, data } = await http().post("/auth/login", payload);
      if (status == 200) {
        localStorage.setItem("PK_TOKEN", data.data.token);
        router.push("/dashboard");
      }
    },

    async logout({ commit }) {
      const { status } = await http().post("/auth/logout");
      if (status == 200) {
        window.localStorage.removeItem("PK_TOKEN");
        location.reload();
      }
    },
  },
  mutations: {
    SET_USER(state, payload) {
      state.users = payload.data;
    },
  },
  getters: {
    // status(state){
    //     return state.status;
    // }
  },
};
