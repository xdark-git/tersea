import { createRouter, createWebHistory } from "vue-router";
import Cookies from "js-cookie";
import { checkSession } from "../api";

const userCookieName = import.meta.env.VITE_VUE_APP_USER_COOKIE;
const routes = [
    {
        path: "/",
        name: "dashboard",
        component: () => import("../pages/Dashboard/Dashboard.vue"),
        meta: {
            requiresAuth: true,
        },
    },
    {
        path: "/profil",
        name: "my-profile",
        component: () => import("../pages/User/MyProfile.vue"),
        meta: {
            requiresAuth: true,
        },
    },
    {
        path: "/employees",
        name: "employees",
        component: () => import("../pages/User/ListEmployees.vue"),
        meta: {
            requiresAuth: true,
        },
    },
    {
        path: "/admin/login",
        name: "login",
        component: () => import("../pages/Admin/Login.vue"),
        meta: {
            needsToLogin: true,
        },
    },
    {
        path: "/employee/login",
        name: "emp-login",
        component: () => import("../pages/Admin/Login.vue"),
        meta: {
            needsToLogin: true,
        },
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
router.beforeEach(async (to, from) => {
    const userCookie = Cookies.get(userCookieName);

    try {
        if (to.meta.needsToLogin && userCookie) {
            return { name: "dashboard" };
        }
        if (to.meta.requiresAuth && !userCookie) {
            return { name: "login" };
        }
        if (to.meta.requiresAuth && userCookie) {
            const userData = JSON.parse(userCookie);
            const response = await checkSession({ token: userData.token });
            if (response?.status === 200) {
                const newUserData = { ...userData };

                Cookies.set(userCookieName, JSON.stringify(newUserData), {
                    expires: 7,
                    path: "/",
                });
            }
        }
    } catch (error) {
        Cookies.remove(userCookieName);
        return { name: "login" };
    }
});
export default router;
