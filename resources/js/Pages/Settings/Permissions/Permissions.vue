<template>
    <div>
        <Link :href="route('settings.permissions.create')">Create Permission</Link>
    </div>
</template>
<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
</script>