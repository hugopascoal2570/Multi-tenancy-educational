<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ACL\PermissionController;
use App\Http\Controllers\Admin\ACL\PermissionProfileController;
use App\Http\Controllers\Admin\ACL\PermissionRoleController;
use App\Http\Controllers\Admin\ACL\PlanProfileController;
use App\Http\Controllers\Admin\ACL\ProfileController;
use App\Http\Controllers\Admin\ACL\RoleController;
use App\Http\Controllers\Admin\ACL\RoleUserController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\DetailPlanController;
use App\Http\Controllers\Admin\FinancialController;
use App\Http\Controllers\Admin\LibraryController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Admin\TenantController;
use App\Http\Controllers\Admin\TurmaController;
use App\Http\Controllers\Admin\TurmaTeacherController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Site\SiteController;
use App\Models\Tenant;
use Illuminate\Support\Facades\Auth;

Route::prefix('admin')->middleware('auth')->group(function () {

    //routes permission x user
    Route::get('users/{id}/permission/{idPermission}/detach', [RoleUserController::class, 'detachPermissionUser'])->name('users.permission.detach');
    Route::post('users/{id}/permissions', [RoleUserController::class, 'attachPermissionsUser'])->name('users.permissions.attach');
    Route::any('users/{id}/permissions/create', [RoleUserController::class, 'permissionsAvailable'])->name('users.permissions.available');
    Route::get('users/{id}/permissions', [RoleUserController::class, 'permissions'])->name('users.permission');
    Route::get('permissions/{id}/users', [PermissionUserController::class, 'users'])->name('permissions.users');

    /**
     * Role x User
     */
    Route::get('users/{id}/role/{idRole}/detach', [RoleUserController::class,'detachRoleUser'])->name('users.role.detach');
    Route::post('users/{id}/roles', [RoleUserController::class,'attachRolesUser'])->name('users.roles.attach');
    Route::any('users/{id}/roles/create', [RoleUserController::class,'rolesAvailable'])->name('users.roles.available');
    Route::get('users/{id}/roles', [RoleUserController::class,'roles'])->name('users.roles');
    Route::get('roles/{id}/users', [RoleUserController::class,'users'])->name('roles.users');

    /**
     * Permission x Role
     */
    Route::get('roles/{id}/permission/{idPermission}/detach', [PermissionRoleController::class,'detachPermissionRole'])->name('roles.permission.detach');
    Route::post('roles/{id}/permissions', [PermissionRoleController::class,'attachPermissionsRole'])->name('roles.permissions.attach');
    Route::any('roles/{id}/permissions/create', [PermissionRoleController::class,'permissionsAvailable'])->name('roles.permissions.available');
    Route::get('roles/{id}/permissions', [PermissionRoleController::class,'permissions'])->name('roles.permissions');
    Route::get('permissions/{id}/role', [PermissionRoleController::class,'roles'])->name('permissions.roles');

    //routes roles 
    Route::any('roles/search', [RoleController::class, 'search'])->name('roles.search');
    Route::resource('roles', RoleController::class);

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

    /**
     * Permission x Role
     */
    Route::get('turmas/{id}/teacher/{idTeacher}/detach', [TurmaTeacherController::class,'detachTeacherTurma'])->name('turmas.teacher.detach');
    Route::post('turmas/{id}/teachers', [TurmaTeacherController::class,'attachTeachersTurma'])->name('turmas.teacher.attach');
    Route::any('turmas/{id}/teachers/create', [TurmaTeacherController::class,'teachersAvailable'])->name('turmas.teacher.available');
    Route::get('turmas/{id}/teachers', [TurmaTeacherController::class,'teachers'])->name('turmas.teachers');

        /**
     * Plan x Profile
     */
    Route::get('plans/{id}/profile/{idProfile}/detach', [PlanProfileController::class,'detachProfilePlan'])->name('plans.profile.detach');
    Route::post('plans/{id}/profiles', [PlanProfileController::class,'attachProfilesPlan'])->name('plans.profiles.attach');
    Route::any('plans/{id}/profiles/create', [PlanProfileController::class,'profilesAvailable'])->name('plans.profiles.available');
    Route::get('plans/{id}/profiles', [PlanProfileController::class,'profiles'])->name('plans.profiles');
    Route::get('profiles/{id}/plans', [PlanProfileController::class,'plans'])->name('profiles.plans');

    //routes classroom 
    Route::any('turmas/search', [TurmaController::class, 'search'])->name('turmas.search');
    Route::resource('turmas', TurmaController::class);

    //routes library
    Route::any('libraries/search', [LibraryController::class, 'search'])->name('libraries.search');
    Route::resource('libraries', LibraryController::class);

    //routes users 
    Route::any('users/search', [UserController::class, 'search'])->name('users.search');
    Route::resource('users', UserController::class);

    /**
     * Plan x Profile
     */
    Route::get('plans/{id}/profile/{idProfile}/detach', [PlanProfileController::class,'detachProfilePlan'])->name('plans.profile.detach');
    Route::post('plans/{id}/profiles', [PlanProfileController::class,'attachProfilesPlan'])->name('plans.profiles.attach');
    Route::any('plans/{id}/profiles/create', [PlanProfileController::class,'profilesAvailable'])->name('plans.profiles.available');
    Route::get('plans/{id}/profiles', [PlanProfileController::class,'profiles'])->name('plans.profiles');
    Route::get('profiles/{id}/plans', [PlanProfileController::class,'plans'])->name('profiles.plans');

    /**
     * Permission x Profile
     */
    Route::get('profiles/{id}/permission/{idPermission}/detach', [PermissionProfileController::class,'detachPermissionProfile'])->name('profiles.permission.detach');
    Route::post('profiles/{id}/permissions', [PermissionProfileController::class,'attachPermissionsProfile'])->name('profiles.permissions.attach');
    Route::any('profiles/{id}/permissions/create', [PermissionProfileController::class,'permissionsAvailable'])->name('profiles.permissions.available');
    Route::get('profiles/{id}/permissions', [PermissionProfileController::class,'permissions'])->name('profiles.permissions');
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
