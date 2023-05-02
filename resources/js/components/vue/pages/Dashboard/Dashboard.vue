<template >
    <div class="container">
        <nav>
            <ul>
                <li>
                    <router-link :to="{path:'/'}" class="link-back-homepage">Acceuil</router-link>
                </li>
                <li>
                    <router-link :to="{path:'/'}" class="link-back-homepage">Mon Profile</router-link>
                </li>
                <li>
                    <router-link :to="{path:'/'}" class="link-back-homepage">Liste des employés</router-link>
                </li>
                <li>
                    <router-link :to="{path:'/'}" class="link-back-homepage">Liste des Entreprises</router-link>
                </li>
                <li>
                    <router-link :to="{path:'/'}" class="link-back-homepage">Liste des admins</router-link>
                </li>
                <li>
                    <router-link :to="{path:'/'}" class="link-back-homepage">Historique</router-link>
                </li>
            </ul>
            <div class="logout">
                <button>Se déconnecter</button>
            </div>
        </nav>
        <div class="content">
            <h1>Bonjour et Bienvenue</h1>
        </div>
    </div>
</template>

<script>
export default {};
</script>
