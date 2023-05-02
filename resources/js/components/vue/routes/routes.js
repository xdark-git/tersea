import { createRouter, createWebHistory } from "vue-router";
import Login from "../pages/Admin/Login.vue";
import NotFound from "../pages/NotFound/NotFound.vue";
import Dashboard from "../pages/Dashboard/Dashboard.vue";
const routes = [
    {
        path: "/",
        name: "dashboard",
        component: Dashboard,
    },
    {
        path: "/admin/login",
        name: "login",
        component: Login,
    },
    {
        path: "/employee/login",
        name: "emp-login",
        component: Login,
    },
    { path: "/:pathMatch(.*)", name: "NotFound", component: NotFound },
];
const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
