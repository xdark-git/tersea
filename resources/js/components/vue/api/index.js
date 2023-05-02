import axios from "axios";

const api = axios.create({
    baseURL: "/api",
    headers: {
        "Content-Type": "application/json",
    },
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
