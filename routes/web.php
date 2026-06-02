<?php

use App\Http\Controllers\CostController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\TenantserviceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
<<<<<<< HEAD


Route::get('', function () {
    return view('login');
})->name('login');

=======
use App\Http\Controllers\website\WebsiteAuthController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\OrganizationUserController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\RegisterController;

//
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('', function () {
    $plans = App\Models\Plan::where('is_active', true)->get();
    return view('website.index', compact('plans'));
})->name('website');

>>>>>>> c57bb21 (subscription module)
Route::get('/debug-sentry', function () {
    throw new Exception('My first Sentry error!');
});

Route::get('/performance-test', function () {
    // Simulate some processing
    sleep(2); // Sleep for 2 seconds
    return 'Performance test completed!';
});

Route::get('/clear-cache', function () {
    Artisan::call('optimize:clear');
    return 'Cleared!';
});


<<<<<<< HEAD
=======
// website route
Route::prefix('website')->group(function () {
    Route::get('/login', [WebsiteAuthController::class, 'login'])->name('website.login');
    Route::post('/login', [WebsiteAuthController::class, 'doLogin'])->name('website.login.submit');
});

>>>>>>> c57bb21 (subscription module)

Route::post('/user-login', [LoginController::class, 'userLogin'])->name('userLogin');
Route::get('/reset-password', [LoginController::class, 'resetPassord'])->name('resetPassord');
Route::post('/send-otp', [LoginController::class, 'sendOTP'])->name('sendOTP');

Route::get('/invoices/{tenant}', [InvoiceController::class, 'show'])->name('invoices.show');
Route::get('/tenant/{tenant}/invoice/pdf', [InvoiceController::class, 'downloadPdf'])->name('tenant.invoice.pdf');


<<<<<<< HEAD
Route::middleware(['auth', 'preventBackAfterLogout'])->group(function () {
    // Protected routes
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('users.dashboard');


=======
Route::middleware(['auth','preventBackAfterLogout'])->group(function () {
    // Protected routes
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('users.dashboard');

>>>>>>> c57bb21 (subscription module)
    // For assigning roles to users
    Route::post('/assign-role', [RoleController::class, 'assignRole'])->name('assign.role');
    Route::post('/store-user', [UserController::class, 'store'])->name('store.user');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/user-create', [UserController::class, 'create'])->name('users.create');
    Route::get('/user-edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/user-destroy/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::put('/user-update/{id}', [UserController::class, 'update'])->name('users.update');

    Route::get('/user-logout', [LoginController::class, 'userLogout'])->name('userLogout');
    Route::get('/user-profile', [UserController::class, 'viewProfile'])->name('viewProfie');
    Route::post('updateProfile', [UserController::class, 'updateProfile'])->name('updateProfile');

    Route::get('/clear-all', [UserController::class, 'clearAll'])->name('clearAll');

<<<<<<< HEAD

    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/roles-create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/roles-store', [UserController::class, 'store'])->name('roles.store');
=======
    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/roles-create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/roles-store', [RoleController::class, 'store'])->name('roles.store');
>>>>>>> c57bb21 (subscription module)
    Route::get('/roles-edit/{id}', [RoleController::class, 'edit'])->name('roles.edit');
    Route::get('/roles-destroy/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');
    Route::put('/roles-update/{id}', [RoleController::class, 'update'])->name('roles.update');

    Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions.index');
    Route::get('/permissions-create', [PermissionController::class, 'create'])->name('permissions.create');
    Route::post('/permissions-store', [PermissionController::class, 'store'])->name('permissions.store');
    Route::get('/permissions-edit/{id}', [PermissionController::class, 'edit'])->name('permissions.edit');
    Route::post('/permissions-destroy/{id}', [PermissionController::class, 'destroy'])->name('permissions.destroy');
    Route::put('/permissions-update/{id}', [PermissionController::class, 'update'])->name('permissions.update');

    Route::get('/logo-view', [UserController::class, 'logoChangeView'])->name('logoChangeView');
    Route::post('/logo-update', [UserController::class, 'logoUpdate'])->name('updateLogo');
    Route::get('/color-view', [UserController::class, 'colorChangeView'])->name('colorChangeView');
    Route::post('/color-update', [UserController::class, 'updateColors'])->name('updateColors');

    Route::prefix('services')->name('services.')->group(function () {
        Route::resource('/', ServiceController::class)->parameters(['' => 'service']);
    });

    Route::prefix('positions')->name('positions.')->group(function () {
        Route::resource('/', PositionController::class)->parameters(['' => 'position']);
    });

    Route::prefix('properties')->name('properties.')->group(function () {
        Route::resource('/', PropertyController::class)->parameters(['' => 'property']);
    });

    Route::prefix('tenants')->name('tenants.')->group(function () {
        Route::resource('/', TenantController::class)->parameters(['' => 'tenant']);
    });

    Route::get('/tenants/services/{id?}', [TenantserviceController::class, 'services'])->name('tenants.services');

    Route::prefix('tenantServices')->name('tenantServices.')->group(function () {
        Route::resource('/', TenantserviceController::class)->parameters(['' => 'tenantService']);
    });

<<<<<<< HEAD
=======

>>>>>>> c57bb21 (subscription module)
    Route::get('/invoice', [TenantserviceController::class, 'invoice'])->name('sendInvoice');
    Route::get('/invoice/change/{id?}', [InvoiceController::class, 'invoiceChange'])->name('invoice.change');
    Route::get('/invoice/send/{id?}', [InvoiceController::class, 'sendInvoice'])->name('invoice.send');

<<<<<<< HEAD

    Route::get('/month/change/{id?}', [TenantController::class, 'monthChange'])->name('month.change');


=======
    Route::get('/month/change/{id?}', [TenantController::class, 'monthChange'])->name('month.change');

>>>>>>> c57bb21 (subscription module)
    Route::prefix('costs')->name('costs.')->group(function () {
        Route::resource('/', CostController::class)->parameters(['' => 'cost']);
    });

    Route::prefix('reports')->name('reports.')->group(function () {
            Route::get('/costs', [ReportController::class, 'costs'])->name('costs');
            Route::post('/costs/filter', [ReportController::class, 'filterCosts'])->name('filterCosts');
            Route::get('/costs/reset', [ReportController::class, 'resetCosts'])->name('resetCosts');
            Route::get('/payments', [ReportController::class, 'payments'])->name('payments');
            Route::post('/payments/filter', [ReportController::class, 'filterPayments'])->name('filterPayments');
            Route::get('/payments/reset', [ReportController::class, 'resetPayments'])->name('resetPayments');
<<<<<<< HEAD


=======
>>>>>>> c57bb21 (subscription module)
    });
    Route::get('/tenant-payment/{tenant}/{month}', [ReportController::class, 'markPaid'])->name('tenant.payment');
    Route::get('/tenant-payment-reverse/{tenant}/{month}', [ReportController::class, 'reverse'])->name('tenant.paymentReverse');

<<<<<<< HEAD

=======
    // organizations
    Route::get('/organization', [OrganizationController::class, 'index'])->name('organizations.index');
    Route::get('/organization/create', [OrganizationController::class, 'create'])->name('organizations.create');
    Route::post('/organization/store', [OrganizationController::class, 'store'])->name('organizations.store');
    Route::delete('/organization/{id}', [OrganizationController::class, 'destroy'])->name('organizations.destroy');

    Route::get('/organization/{id}/edit', [OrganizationController::class, 'edit'])->name('organizations.edit');
    Route::put('/organization/{id}', [OrganizationController::class, 'update'])->name('organizations.update');

    Route::get('organization/user',[OrganizationUserController::class,'index'])->name('organizationUser.index');
    Route::get('organization/user/create',[OrganizationUserController::class,'create'])->name('organizationUser.create');
    Route::post('organization/user/store', [OrganizationUserController::class, 'store'])->name('organizationUser.store');;
});

Route::get('/plans', [PlanController::class, 'index'])->name('plans');

// Public routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

// Protected routes
Route::middleware(['auth'])->group(function () {
    Route::post('/subscribe/{plan}', [PlanController::class, 'subscribe'])->name('subscribe');
    Route::get('/subscribe/{plan}', [PlanController::class, 'subscribe'])->name('subscribe');
});

// Resource routes with plan limit middleware
Route::middleware(['auth', 'plan.limit:properties'])->group(function () {
    Route::resource('/properties', PropertyController::class)->except(['index', 'show']);
});

Route::middleware(['auth', 'plan.limit:tenants'])->group(function () {
    Route::resource('/tenants', TenantController::class)->except(['index', 'show']);
});
Route::middleware(['auth', 'plan.limit:users'])->group(function () {
    Route::post('/store-user', [UserController::class, 'store'])->name('store-user');
>>>>>>> c57bb21 (subscription module)
});
