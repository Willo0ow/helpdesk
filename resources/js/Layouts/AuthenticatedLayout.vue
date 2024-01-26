<template>
    <v-layout class="layout">
        <v-app-bar color="surface-variant">
            <template #title>
                <Link :href="route('dashboard')">
                    <ApplicationLogo class="application-logo" /> </Link
            ></template>

            <Link :href="route('settings.permissions')">Permissions</Link>
            <Menu />
        </v-app-bar>
        <v-navigation-drawer>
            <v-list>
                <v-list-item title="Drawer left"></v-list-item>
            </v-list>
        </v-navigation-drawer>
        <v-main style="min-height: 300px">
            <slot />
        </v-main>
    </v-layout>
</template>
<script setup lang="ts">
import { ref } from "vue";
import { Link } from "@inertiajs/vue3";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import Menu from "@/Components/Menu.vue";
import "vuetify/styles";
</script>
<style lang="scss" scoped>
.layout {
    min-height: 100vh;
    background-color: #eeeeee;
}
.application-logo {
    max-height: 3rem;
    fill: currentColor;
    color: #ffffff;
    display: block;
}
</style>
