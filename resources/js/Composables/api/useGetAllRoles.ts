import { useQuery } from "@tanstack/vue-query";
import type { RoleWithPermissions } from "@/types/externalLaravelTypes";

export const useGetAllRoles = () => {
    const getAllRoles = async (): Promise<RoleWithPermissions[]> => {
        const response = await axios.get("/api/role");
        return response.data;
    };

    const {
        isLoading,
        data: roles,
        error,
    } = useQuery({
        queryKey: ["roles"],
        queryFn: getAllRoles,
    });

    return { isLoading, roles, error };
};
