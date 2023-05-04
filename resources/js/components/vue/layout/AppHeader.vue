<template>
    <nav>
        <ul>
            <li>
                <router-link :to="{ path: '/' }">Acceuil</router-link>
            </li>
            <li>
                <router-link :to="{ path: '/profil' }">Mon Profile</router-link>
            </li>
            <li>
                <router-link :to="{ path: '/employees' }"
                    >Liste des employés</router-link
                >
            </li>
            <li>
                <router-link :to="{ path: '/' }"
                    >Liste des Entreprises</router-link
                >
            </li>
            <li>
                <router-link :to="{ path: '/' }">Liste des admins</router-link>
            </li>
            <li>
                <router-link :to="{ path: '/' }">Historique</router-link>
            </li>
        </ul>
        <div class="logout">
            <button @click="logout">Se déconnecter</button>
        </div>
    </nav>
</template>

<script>
import endSession from "../actions/logout";
export default {
    // computed: {
    //     isUserLogin(){
    //         return this.$store.state.isUserLogin
    //     }
    // }
    methods: {
        logout() {
            endSession(this.$router);
        },
    },
};
</script>
