<template>
    <v-sheet class="pa-4 rounded-lg role-permissions">
        <div v-if="role?.name">
            <h2 class="text-h5">Role: {{ role.name }}</h2>

            <h3>Assigned Permissions</h3>
            <v-list
                :items="role.permissions"
                item-title="name"
                item-value="id"
            />
            <EditRolePermissions v-if="permissions" :role="role" :permissions="permissions" />
        </div>
    </v-sheet>
</template>
<script setup lang="ts">
import { useGetAllPermissions } from "@/Composables/api/useGetAllPermissions";
import EditRolePermissions from "@/Components/permissions/EditRolePermissions.vue";
import { type RoleWithPermissions } from "@/types/externalLaravelTypes";

defineProps<{
    role: RoleWithPermissions | undefined;
}>();

const { isLoading, permissions } = useGetAllPermissions();
</script>
<style lang="scss" scoped>
.role-permissions {
    min-height: calc(100vh - 100px);
}
</style>
