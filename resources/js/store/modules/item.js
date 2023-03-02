import http from "./../../axios";
import router from "./../../router";

export default {
  namespaced: true,
  state: {
    items: {},
    packing: [],
    status: "loading",
  },
  actions: {
    async index({ commit }, payload) {
      const { data } = await http().get("/item", { params: payload });
      commit("SET_ITEMS", data);
    },
    async savePacking({ dispatch }, payload) {
      await http().post("/item/packing", payload);
      dispatch("index");
    },
    async showPacking({ commit }, payload) {
      const { data } = await http().get(`/item/packing/${payload.itemcode}`);
      commit("SET_PACKING", data);
    },
    async deletePacking({ dispatch }, id) {
      const { data } = await http().delete(`/item/packing/${id}`);
      dispatch("index");
    },
    async updatePacking({ dispatch }, payload) {
      const { data } = await http().put(`/item/packing/${payload.id}`, payload);
      dispatch("index");
    },
  },
  mutations: {
    SET_ITEMS(state, payload) {
      state.items = payload.data;
    },
    SET_PACKING(state, payload) {
      state.packing = payload.data;
    },
  },
  getters: {
    items(state) {
      return state.items;
    },
    packing(state) {
      return state.packing;
    },
  },
};
