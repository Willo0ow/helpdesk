import { useMutation, useQueryClient } from "@tanstack/vue-query";

export interface UpdateRolePermissionsArgs {
    roleId: number;
    permissionIds: number[];
}

export const useUpdateRolePermissions = () => {
    const queryClient = useQueryClient()

    const updateRolePermissions = async (muntationArgs: UpdateRolePermissionsArgs) => {
        const response = await axios.post(
            `/api/role/sync-permissions/${muntationArgs.roleId}`,
            { permissionIds: muntationArgs.permissionIds }
        );
    };

    const { isPending, isError, error, isSuccess, mutate } = useMutation({
        mutationFn: async (muntationArgs: UpdateRolePermissionsArgs) => await updateRolePermissions(muntationArgs),
        onSuccess: () => {
            queryClient.invalidateQueries({ queryKey: ['roles'] });
        },
    });

    return { mutate };
};
