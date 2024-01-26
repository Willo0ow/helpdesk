import { useQuery } from "@tanstack/vue-query";

import type { Permission } from "@/types/externalLaravelTypes";

export const useGetAllPermissions = () => {
    const getAllPermissions = async (): Promise<Permission[]> => {
        const response = await axios.get("/api/permission");
        return response.data;
    };

    const {
        isLoading,
        data: permissions,
        error,
    } = useQuery({
        queryKey: ["permissions"],
        queryFn: getAllPermissions,
    });

    return { isLoading, permissions, error };
};
