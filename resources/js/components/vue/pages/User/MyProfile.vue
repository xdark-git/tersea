<template>
    <div class="container">
        <app-header></app-header>
        <div class="content">
            <h1>Mon profil</h1>
            <div class="profile">
                <div class="full-name">
                    <p>Nom Complet</p>
                    <p>{{ user?.name }}</p>
                </div>
                <div class="email">
                    <p>Email</p>
                    <p>{{ user?.email }}</p>
                </div>
                <div class="phone" v-if="!user.is_admin">
                    <p>Date de naissance</p>
                    <p>{{ user.phone }}</p>
                </div>
                <div class="birth" v-if="!user.is_admin">
                    <p>Téléphone</p>
                    <p>{{ user.phone }}</p>
                </div>
                <div class="company" v-if="!user.is_admin">
                    <p>Entreprise</p>
                    <p>{{ user?.company }}</p>
                </div>
                <div class="company" v-if="user.is_admin">
                    <p>Role</p>
                    <p>Administrateur</p>
                </div>
                <!--  
                <div class="buttons">
                    <button class="edit">Modifier</button>
                    <button class="change-password">Mot de passe </button> 
                </div>
                -->
            </div>
        </div>
    </div>
</template>

<script>
import AppHeader from "../../layout/AppHeader.vue";
export default {
    components: {
        "app-header": AppHeader,
    },
    computed: {
        user(){
            return this.$store.state.userData
        }
     }

};
</script>
