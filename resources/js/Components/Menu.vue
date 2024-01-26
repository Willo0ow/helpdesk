<template>
    <div class="text-center">
        <v-menu open-on-hover>
            <template v-slot:activator="{ props }">
                <v-btn color="primary" v-bind="props">
                    {{ $page.props.auth.user.name }}
                </v-btn>
            </template>

            <v-list>
                <v-list-item>
                    <v-list-item-title>
                        <Link :href="route('profile.edit')"> Profile </Link>
                    </v-list-item-title>
                </v-list-item>
                <v-list-item>
                    <v-list-item-title>
                        <Link :href="route('logout')" method="post" as="button">
                            Log Out
                        </Link>
                    </v-list-item-title>
                </v-list-item>
            </v-list>
        </v-menu>
    </div>
</template>
<script setup lang="ts">
import { Link } from "@inertiajs/vue3";
</script>
