export interface Permission {
    id: number;
    name: string;
    guard_name: string;
    created_at?: string;
    updated_at?: string;
}
export interface PermissionWithPivot extends Permission {
    pivot: {
        model_id: number;
        permission_id: number;
        model_type: string;
    };
}
export interface Role {
    id: number;
    name: string;
    guard_name: string;
    created_at?: string;
    updated_at?: string;
}
export interface RoleWithPermissions extends Role {
    permissions: PermissionWithPivot[];
}