<template>
    <div class="login">
        <h1>Bienvenue</h1>
        <p>
            **Nous avons créé ce site uniquement pour tester l'application,
            c'est pourquoi nous n'avons pas travaillé sur le design.**
        </p>
        <form @submit.prevent="connectUser()">
            <input
                type="email"
                v-model="email"
                placeholder="Entrez votre email"
            />
            <input
                type="password"
                v-model="password"
                placeholder="Entrez votre mot de passe"
            />
            <button>Se connecter</button>
        </form>
    </div>
</template>
<script>
import { connectAdmin, connectEmployee } from "../../api/index.js";

export default {
    name: "LoginAdmin",
    data() {
        if (this.$route.fullPath.match(/^\/admin\/login\/?$/)) {
            return {
                email: "admin@tersea.com",
                password: "tersea",
            };
        } else {
            return {
                email: "",
                password: "",
            };
        }
    },
    methods: {
        async connectUser() {
            // alert('clicked')
            const data = {
                email: this.email,
                password: this.password,
            };
            const response = this.$route.fullPath.match(/^\/admin\/login\/?$/)
                ? await connectAdmin(data)
                : await connectEmployee(data);
            console.log(response);
        },
    },
};
</script>
