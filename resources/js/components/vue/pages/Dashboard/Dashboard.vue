<template >
    <div class="container">
        <app-header></app-header>
        <div class="content">
            <h1>Bonjour et Bienvenue</h1>
        </div>
    </div>
</template>

<script>
import AppHeader from '../../layout/AppHeader.vue';
export default {
    components:{
        'app-header': AppHeader
    }
};
</script>
