import { PermissionWithPivot } from "./externalLaravelTypes";
export type PagePropsUser = {
    id: number;
    name: string;
    email: string;
    email_verified_at: string;
    allPermissions: PermissionWithPivot[];
}

export type PageProps<T extends Record<string, unknown> = Record<string, unknown>> = T & {
    auth: {
        user: User;
    };
};
