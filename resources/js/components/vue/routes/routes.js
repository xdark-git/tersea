import { createRouter, createWebHistory } from "vue-router";
import LoginAdmin from "../pages/Admin/LoginAdmin.vue";
import NotFound from "../pages/NotFound/NotFound.vue";
const routes = [
    {
        path: "/admin/login",
        name: "login",
        component: LoginAdmin,
    },
    { path: "/:pathMatch(.*)", name: "NotFound", component: NotFound },
];
const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
