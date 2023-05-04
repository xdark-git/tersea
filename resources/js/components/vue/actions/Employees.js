import { getAllEmployee } from "../api";

export const getEmployees = async () => {
    try {
        const response = await getAllEmployee();
        // console.log(response.data.);
        return response;
    } catch (error) {
        return null;
    }
};
