<template>
    <AuthenticatedLayout>
        <!-- <Link :href="route('settings.permissions.create')"
            >Create Permission</Link
        > -->
        <v-container>
            <v-row>
                <v-col cols="3">
                    <v-sheet class="rounded-lg pa-1">
                        <v-list
                        ref="roleList"
                            v-if="roles && roles.length > 0"
                            density="compact"
                            :items="rolesWithProps"
                            item-title="name"
                            item-props="props"
                            item-value="id"
                            @update:selected="
                                selectedRoleId = $event?.[0] as number
                            "
                            mandatory
                            :selected="[selectedElement]"
                        />
                    </v-sheet>
                </v-col>
                <v-col>
                    <RolePermissions :role="selectedRole" />
                </v-col>
            </v-row>
        </v-container>
    </AuthenticatedLayout>
</template>
<script setup lang="ts">
import { ref, computed } from "vue";
import { useGetAllRoles } from "@/Composables/api/useGetAllRoles";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import RolePermissions from "@/Components/permissions/RolePermissions.vue";
import { Link } from "@inertiajs/vue3";

import { type RoleWithPermissions } from "@/types/externalLaravelTypes";
import { type PagePropsUser } from "@/types/index";
import { watch } from "vue";

defineProps<{
    auth: {
        user: PagePropsUser;
    };
}>();

const { isLoading, roles } = useGetAllRoles();

interface RoleWithProps extends RoleWithPermissions {
    props: {
        color: string;
        rounded: string;
    };
}
const roleList = ref<HTMLElement | null>(null);

const rolesWithProps = computed<RoleWithProps[]>(() => {
    return (
        roles?.value?.map((role) => {
            return {
                ...role,
                props: {
                    color: "primary",
                    rounded: "xl",
                },
            };
        }) || []
    );
});

const selectedRoleId = ref<number | null>(null);
const selectedElement = computed(() => {
    if(!selectedRoleId.value) return roles.value?.[0].id;
    return selectedRoleId.value;
});

watch(selectedElement, (newVal, oldVal) => {
    if (!oldVal && newVal) {
        selectedRoleId.value = newVal;
    }
});

const selectedRole = computed<RoleWithPermissions | undefined>(() => {
    return roles.value?.find((role) => role.id === selectedRoleId.value);
});
</script>
<style lang="scss" scoped></style>
