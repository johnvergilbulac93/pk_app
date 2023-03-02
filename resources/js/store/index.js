import { createStore } from "vuex";
import User from "./modules/user";
import Item from "./modules/item";
import Option from "./modules/option";


export default createStore({
  modules: {
    User,
    Item,
    Option
  },
});
