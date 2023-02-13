import { createRouter, createWebHistory } from "vue-router";
import routes from "./routes";

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});
function isLoggedIn() {
  return localStorage.getItem("PK_TOKEN");
}
router.beforeEach((to, from, next) => {
  // if (to.name !== "Login" && !window.localStorage.getItem("PK_TOKEN"))
  //   next({ name: "Login" });
  // else next();
  if (to.matched.some((record) => record.meta.requireGuest)) {
    if (isLoggedIn()) {
      next({
        path: "/dashboard",
        query: { redirect: to.fullPath },
      });
    } else {
      next();
    }
  } else if (to.matched.some((record) => record.meta.requiresAuth)) {
    if (!isLoggedIn()) {
      next({
        path: "/login",
        query: { redirect: to.fullPath },
      });
    } else {
      next();
    }
  }
});

export default router;
