import Test from "./../components/pages/test.vue";
import Login from "./../components/pages/auth/Login.vue";
import Dashboard from "./../components/pages/Dashboard.vue";
import BaseContainer from "../components/usable/BaseContainer.vue";
import Masterfile from "./../components/pages/masterfile/Masterfile.vue";
import Transaction from "./../components/pages/transaction/Transaction.vue";
import Report from "./../components/pages/report/Report.vue";
import Item from "./../components/pages/masterfile/components/Item.vue";
import Customer from "./../components/pages/masterfile/components/Customer.vue";
import Supplier from "./../components/pages/masterfile/components/Supplier.vue";

const routes = [
  {
    path: "/home",
    name: "test",
    component: Test,
    meta: { noAuth: true },
  },
  {
    path: "/login",
    name: "Login",
    component: Login,
    meta: { requireGuest: true },
  },
  {
    path: "/",
    redirect: "/dashboard",
    name: "Home",
    component: BaseContainer,
    children: [
      {
        path: "/dashboard",
        name: "dashboard",
        component: Dashboard,
        meta: { requiresAuth: true },
      },
      {
        path: "/masterfile",
        name: "masterfile",
        component: Masterfile,
        meta: { requiresAuth: true },
      },
      {
        path: "/transaction",
        name: "transaction",
        component: Transaction,
        meta: { requiresAuth: true },
      },
      {
        path: "/report",
        name: "report",
        component: Report,
        meta: { requiresAuth: true },
      },
      {
        path: "/item",
        name: "item",
        component: Item,
        meta: { requiresAuth: true },
      },
      {
        path: "/customer",
        name: "customer",
        component: Customer,
        meta: { requiresAuth: true },
      },
      {
        path: "/supplier",
        name: "supplier",
        component: Supplier,
        meta: { requiresAuth: true },
      },
    ],
  },
  //   {
  //     path: "/forgot-password",
  //     name: "ForgotPassword",
  //     component: () =>
  //       import(
  //         /* webpackChunkName: "about" */ "../views/auth/ForgotPassword.vue"
  //       ),
  //     meta: { noAuth: true },
  //   },
];

export default routes;
