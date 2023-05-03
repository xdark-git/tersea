import axios from "axios";
import Cookies from "js-cookie";
const userCookieName = import.meta.env.VITE_VUE_APP_USER_COOKIE;

const api = axios.create({
    baseURL: "/api",
    headers: {
        "Content-Type": "application/json",
    },
});

api.interceptors.request.use((req) => {
    const userCookie = Cookies.get(userCookieName);

    if (userCookie) {
        const userData = JSON.parse(userCookie);
        req.headers.Authorization = `Bearer ${userData.token}`;
    }
    return req;
});

export const connectAdmin = (data) => {
    return api.post("/admin/login", data);
};

export const connectEmployee = (data) => {
    return api.post("/employee/login", data);
};

export const checkSession = (data) => {
    return api.post("/verify/token", data);
};

export const endSession = () => {
    return api.delete("/verify/end-session");
};
