import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: "/",
        name: "dashboard",
        component: () => import("../pages/Dashboard/Dashboard.vue"),
    },
    {
        path: "/admin/login",
        name: "login",
        component: () => import("../pages/Admin/Login.vue"),
    },
    {
        path: "/employee/login",
        name: "emp-login",
        component: () => import("../pages/Admin/Login.vue"),
    },
    {
        path: "/:pathMatch(.*)",
        name: "NotFound",
        component: () => import("../pages/Dashboard/Dashboard.vue"),
    },
];
const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
