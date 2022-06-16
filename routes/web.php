<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ClassRoomController;
use App\Http\Controllers\Admin\ACL\PermissionController;
use App\Http\Controllers\Admin\ACL\PermissionProfileController;
use App\Http\Controllers\Admin\ACL\PermissionRoleController;
use App\Http\Controllers\Admin\ACL\PlanProfileController;
use App\Http\Controllers\Admin\ACL\ProfileController;
use App\Http\Controllers\Admin\ACL\RoleUserController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\DetailPlanController;
use App\Http\Controllers\Admin\FinancialController;
use App\Http\Controllers\Admin\LibraryController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Admin\TenantController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\SubjectController;
use App\Models\Tenant;
use Illuminate\Support\Facades\Auth;

Route::prefix('admin')->middleware('auth')->group(function () {


    //routes role x user
    Route::get('users/{id}/role/{idPermission}/detach', [RoleUserController::class, 'detachRoleUser'])->name('users.role.detach');
    Route::post('users/{id}/roles', [RoleUserController::class, 'attachRolesUser'])->name('users.roles.attach');
    Route::any('users/{id}/roles/create', [RoleUserController::class, 'rolesAvailable'])->name('users.roles.available');
    Route::get('users/{id}/roles', [RoleUserController::class, 'roles'])->name('users.roles');
    Route::get('roles/{id}/users', [RoleUserController::class, 'users'])->name('roles.users');


    //routes role x permission
    Route::get('roles/{id}/permission/{idPermission}/detach', [PermissionRoleController::class, 'detachPermissionRole'])->name('roles.permission.detach');
    Route::post('roles/{id}/permissions', [PermissionRoleController::class, 'attachPermissionsProfile'])->name('roles.permissions.attach');
    Route::any('roles/{id}/permissions/create', [PermissionRoleController::class, 'permissionsAvailable'])->name('roles.permissions.available');
    Route::get('roles/{id}/permissions', [PermissionRoleController::class, 'permissions'])->name('roles.permissions');
    Route::get('permissions/{id}/role', [PermissionRoleController::class, 'roles'])->name('permission.roles');

    //routes roles 
    Route::any('roles/search', [RolesController::class, 'search'])->name('roles.search');
    Route::resource('roles', RolesController::class);

    //routes tenants 
    Route::any('tenants/search', [TableController::class, 'search'])->name('tenants.search');
    Route::resource('tenants', TenantController::class);

    //routes tables 
    Route::any('tables/search', [TableController::class, 'search'])->name('tables.search');
    Route::resource('tables', TableController::class);


    //routes financeiro 
    Route::any('financial/search', [FinancialController::class, 'search'])->name('financial.search');
    Route::resource('financial', FinancialController::class);

    //routes subjects
    Route::any('subjects/search', [SubjectController::class, 'search'])->name('subjects.search');
    Route::resource('subjects', SubjectController::class);

    //routes rooms
    Route::any('rooms/search', [RoomController::class, 'search'])->name('rooms.search');
    Route::resource('rooms', RoomController::class);

    //routes classroom 
    Route::any('classrooms/search', [ClassRoomController::class, 'search'])->name('classrooms.search');
    Route::resource('classrooms', ClassRoomController::class);

    //routes library
    Route::any('libraries/search', [LibraryController::class, 'search'])->name('libraries.search');
    Route::resource('libraries', LibraryController::class);

    //routes users 
    Route::any('users/search', [UserController::class, 'search'])->name('users.search');
    Route::resource('users', UserController::class);

    //routes plan x profiles
    Route::get('plans/{id}/profile/{idProfile}/detach', [PlanProfileController::class, 'detachProfilePlan'])->name('plans.profile.detach');
    Route::post('plans/{id}/profiles', [PlanProfileController::class, 'attachProfilesPlan'])->name('plans.profiles.attach');
    Route::any('plans/{id}/profiles/create', [PlanProfileController::class, 'profilesAvailable'])->name('plans.profiles.available');
    Route::get('plans/{id}/profiles', [PlanProfileController::class, 'profiles'])->name('plans.profiles');
    Route::get('/profiles/{id}/plans', [PlanProfileController::class, 'plans'])->name('profiles.plans');


    //routes permission x profile
    Route::get('profiles/{id}/permission/{idPermission}/detach', [PermissionProfileController::class, 'detachPermissionProfile'])->name('profiles.permission.detach');
    Route::post('profiles/{id}/permissions', [PermissionProfileController::class, 'attachPermissionsProfile'])->name('profiles.permissions.attach');
    Route::any('profiles/{id}/permissions/create', [PermissionProfileController::class, 'permissionsAvailable'])->name('profiles.permissions.available');
    Route::get('profiles/{id}/permissions', [PermissionProfileController::class, 'permissions'])->name('profiles.permissions');
    Route::get('permissions/{id}/profile', [PermissionProfileController::class, 'profiles'])->name('permissions.profiles');

    //routes permission
    Route::resource('/permissions', PermissionController::class);
    Route::any('permissions/search', [PermissionController::class, 'search'])->name('permissions.search');

    //routes Profile 
    Route::resource('/profiles', ProfileController::class);
    Route::any('profiles/search', [ProfileController::class, 'search'])->name('profiles.search');

    //routes details plans
    Route::delete('plans/{url}/details/{idDetail}', [DetailPlanController::class, 'destroy'])->name('details.plan.destroy');
    Route::get('plans/{url}/details/create', [DetailPlanController::class, 'create'])->name('details.plan.create');
    Route::get('plans/{url}/details/{idDetail}', [DetailPlanController::class, 'show'])->name('details.plan.show');
    Route::put('plans/{url}/details/{idDetail}', [DetailPlanController::class, 'update'])->name('details.plan.update');
    Route::get('plans/{url}/details/{idDetail}/edit', [DetailPlanController::class, 'edit'])->name('details.plan.edit');
    Route::post('plans/{url}/details', [DetailPlanController::class, 'store'])->name('details.plan.store');
    Route::get('plans/{url}/details', [DetailPlanController::class, 'index'])->name('details.plan.index');

    //routes plans
    Route::get('plans/create', [PlanController::class, 'create'])->name('plans.create');
    Route::put('plans/{url}', [PlanController::class, 'update'])->name('plans.update');
    Route::get('plans/{url}/edit', [PlanController::class, 'edit'])->name('plans.edit');
    Route::any('plans/search', [PlanController::class, 'search'])->name('plans.search');
    Route::delete('plans/{url}', [PlanController::class, 'destroy'])->name('plans.destroy');
    Route::get('plans/{url}', [PlanController::class, 'show'])->name('plans.show');
    Route::post('plans', [PlanController::class, 'store'])->name('plans.store');
    Route::get('plans', [PlanController::class, 'index'])->name('plans.index');

    //route home dashboard
    Route::get('/', [PlanController::class, 'index'])->name('admin.index');
});

//site
Route::get('/plan/{url}', [SiteController::class, 'plan'])->name('plan.subscription');
Route::get('/', [SiteController::class, 'index'])->name('site.home');

Auth::routes();
