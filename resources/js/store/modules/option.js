import http from "./../../axios";
import router from "./../../router";

export default {
  namespaced: true,
  state: {
    all_price_groups: [],
    all_packing_per_items: [],
  },
  actions: {
    async getPriceGroup({ commit }) {
      const { data } = await http().get("/option/price_group");
      commit("SET_PRICE_GROUP", data);
    },
    async getPackingPerItem({ commit }, payload) {
      const { data } = await http().get(`/option/packing/${payload.itemcode}`);
	 console.log(data)
      commit("SET_PACKING_PER_ITEM", data);
    },
  },
  mutations: {
    SET_PRICE_GROUP(state, payload) {
      state.all_price_groups = payload.data;
    },
    SET_PACKING_PER_ITEM(state, payload) {
      state.all_packing_per_items = payload.data;
    },
  },
  getters: {
    all_price_groups(state) {
      return state.all_price_groups;
    },
    all_packing_per_items(state) {
      return state.all_packing_per_items;
    },
  },
};
