import { createStore } from "vuex";
import Cookies from "js-cookie";
import { getEmployees } from "../actions/Employees";
const userCookieName = import.meta.env.VITE_VUE_APP_USER_COOKIE;
const userCookie = Cookies.get(userCookieName);

const store = createStore({
    state: {
        userData: userCookie ? JSON.parse(userCookie).data : {},
    },
});

export default store;
