<template>
    <v-row justify="center">
        <v-dialog
            v-model="dialog"
            :scrim="false"
            transition="dialog-bottom-transition"
        >
            <template v-slot:activator="{ props }">
                <v-btn color="primary" dark v-bind="props">Edit permissions</v-btn>
            </template>
            <v-card>
                <v-toolbar dark color="primary">
                    <v-btn icon dark @click="dialog = false">
                        <v-icon>mdi-close</v-icon>
                    </v-btn>
                    <v-toolbar-title>{{ role.name }}</v-toolbar-title>
                    <v-spacer></v-spacer>
                    <v-toolbar-items>
                        <v-btn variant="text" @click="saveRolePermissions">
                            Save
                        </v-btn>
                    </v-toolbar-items>
                </v-toolbar>

                <v-list>
                    <v-list-item
                        v-for="permission in permissions"
                        :key="permission.id"
                        :title="permission.name"
                    >
                        <template v-slot:prepend>
                            <v-checkbox
                                v-model="selectedPermissions"
                                :value="permission.id"
                                :multiple="true"
                            ></v-checkbox>
                        </template>
                    </v-list-item>
                </v-list>
            </v-card>
        </v-dialog>
    </v-row>
</template>
<script setup lang="ts">
import { computed, ref, watch } from "vue";
import { useUpdateRolePermissions, type UpdateRolePermissionsArgs } from "@/Composables/api/useUpdateRolePermissions";
import { RoleWithPermissions, Permission } from "@/types/externalLaravelTypes";

const props = defineProps<{
    role: RoleWithPermissions;
    permissions: Permission[];
}>();

const dialog = ref(false);

const selectedPermissions = ref(
    props.role.permissions.map((permission) => permission.id)
);

const rolePermissions = computed(() => {
    return props.role.permissions.map((permission) => permission.id);
});

watch(rolePermissions, (newVal) => {
    if (newVal) selectedPermissions.value = [...newVal];
});

const { mutate } = useUpdateRolePermissions();

const saveRolePermissions = () => {
    mutate({
        roleId: props.role.id,
        permissionIds: selectedPermissions.value as UpdateRolePermissionsArgs["permissionIds"],
    }, {
        onSettled: () => {
            dialog.value = false;
        },
    });
};
</script>
<style>
.dialog-bottom-transition-enter-active,
.dialog-bottom-transition-leave-active {
    transition: transform 0.2s ease-in-out;
}
</style>
