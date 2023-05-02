<template>
    <nav>
        <ul>
            <li>
                <router-link :to="{ path: '/' }" class="link-back-homepage"
                    >Acceuil</router-link
                >
            </li>
            <li>
                <router-link :to="{ path: '/' }" class="link-back-homepage"
                    >Mon Profile</router-link
                >
            </li>
            <li>
                <router-link :to="{ path: '/' }" class="link-back-homepage"
                    >Liste des employés</router-link
                >
            </li>
            <li>
                <router-link :to="{ path: '/' }" class="link-back-homepage"
                    >Liste des Entreprises</router-link
                >
            </li>
            <li>
                <router-link :to="{ path: '/' }" class="link-back-homepage"
                    >Liste des admins</router-link
                >
            </li>
            <li>
                <router-link :to="{ path: '/' }" class="link-back-homepage"
                    >Historique</router-link
                >
            </li>
        </ul>
        <div class="logout">
            <button>Se déconnecter</button>
        </div>
    </nav>
</template>

<script>
export default {
    // computed: {
    //     isUserLogin(){
    //         return this.$store.state.isUserLogin
    //     }
    // }
};
</script>
