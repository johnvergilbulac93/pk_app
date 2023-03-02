import http from "./../../axios";
import router from "./../../router";

export default {
  namespaced: true,
  state: {
    items: {},
    status: "loading",
  },
  actions: {
    async savePacking({ commit }, payload) {
      const { data } = await http().get("/item", { params: payload });
      commit("SET_ITEMS", data);
    },
  },
  mutations: {
    SET_ITEMS(state, payload) {
      state.items = payload.data;
    },
  },
  getters: {
    items(state) {
      return state.items;
    },
  },
};
