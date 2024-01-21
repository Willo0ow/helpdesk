<?php

use App\Http\Controllers\PermissionsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/role', [PermissionsController::class, 'index']);
Route::get('/role/show-permissions/{role}', [PermissionsController::class, 'showRolePermissions']);
Route::get('/user/permissions/{user}', [PermissionsController::class, 'showUserPermissions']);

Route::get('/user/assign-role/{user}/{role}', [PermissionsController::class, 'assignRoleToUser']);
Route::get('/role/add-permission/{role}/{permission}', [PermissionsController::class, 'addRolePermission']);
Route::get('/role/remove-permission/{role}/{permission}', [PermissionsController::class, 'removeRolePermission']);
Route::get('/permission/create/{name}', [PermissionsController::class, 'createPermission']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
