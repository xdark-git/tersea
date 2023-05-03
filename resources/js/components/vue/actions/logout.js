import { endSession } from "../api";
import Cookies from "js-cookie";
const userCookieName = import.meta.env.VITE_VUE_APP_USER_COOKIE;

const logoutUser = async ($router) => {
    const userCookie = Cookies.get(userCookieName);
    if (!userCookie) {
        $router.push("/admin/login");
    }
    const response = await endSession();
    if (response.status == 200) {
        Cookies.remove(userCookieName);
        $router.push("/admin/login");
    }
};

export default logoutUser;
