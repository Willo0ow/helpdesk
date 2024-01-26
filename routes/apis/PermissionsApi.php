<?php

use App\Http\Controllers\PermissionsController;
use Illuminate\Support\Facades\Route;

Route::get('/role', [PermissionsController::class, 'roles']);
Route::get('/permission', [PermissionsController::class, 'permissions']);
Route::get('/role/show-permissions/{role}', [PermissionsController::class, 'showRolePermissions']);
Route::get('/user/permissions/{user}', [PermissionsController::class, 'showUserPermissions']);

Route::get('/user/assign-role/{user}/{role}', [PermissionsController::class, 'assignRoleToUser']);
Route::get('/role/add-permission/{role}/{permission}', [PermissionsController::class, 'addRolePermission']);
Route::get('/role/remove-permission/{role}/{permission}', [PermissionsController::class, 'removeRolePermission']);
Route::get('/permission/create/{name}', [PermissionsController::class, 'createPermission']);


Route::post('/role/sync-permissions/{role}', [PermissionsController::class, 'syncRolePermissions']);