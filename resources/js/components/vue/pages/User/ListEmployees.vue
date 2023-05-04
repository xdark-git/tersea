<template>
    <div class="container">
        <app-header></app-header>
        <div class="content">
            <div class="header">
                <h1>Liste des employés</h1>
                <button>Ajouter un nouveau employé</button>
            </div>
            <div v-if="employees">
                <table id="customers" v-for="employee in employees">
                    <tr>
                        <th>Nom</th>
                        <th>email</th>
                        <th>Entreprise</th>
                        <th>Status du compte</th>
                        <!--<th></th>-->
                    </tr>
                    <tr>
                        <td>{{ employee.name }}</td>
                        <td>{{ employee.email }}</td>
                        <td>
                            {{ employee.company ? employee.company.name : "N/A" }}
                        </td>
                        <td>Validé</td>
                        <!-- <td>Supprimer</td> -->
                    </tr>
                </table>
            </div>
            <div class="empty" v-else>Aucun employé trouvé</div>
        </div>
    </div>
</template>

<script>
// import { getEmployees } from "../../actions/Employees";
import { getAllEmployee } from "../../api";
import AppHeader from "../../layout/AppHeader.vue";
export default {
    data() {
        return {
            employees: [],
        };
    },
    methods: {
        async getAllEmployees() {
            const response = await getAllEmployee();
            return response.data.data;
        },
    },
    async created() {
        this.employees = await this.getAllEmployees();
    },
    components: {
        "app-header": AppHeader,
    },
    computed: {},
};
</script>
