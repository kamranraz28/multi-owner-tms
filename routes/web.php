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
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\OrganizationUserController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\RegisterController;

Route::get('', function () {
    $plans = App\Models\Plan::where('is_active', true)->get();
    return view('website.index', compact('plans'));
})->name('home');

Route::get('/login', function () {
    return view('login');
})->name('login');

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



Route::post('/user-login', [LoginController::class, 'userLogin'])->name('userLogin');
Route::get('/reset-password', [LoginController::class, 'resetPassord'])->name('resetPassord');
Route::post('/send-otp', [LoginController::class, 'sendOTP'])->name('sendOTP');

Route::get('/invoices/{tenant}', [InvoiceController::class, 'show'])->name('invoices.show');
Route::get('/tenant/{tenant}/invoice/pdf', [InvoiceController::class, 'downloadPdf'])->name('tenant.invoice.pdf');


Route::middleware(['auth', 'preventBackAfterLogout'])->group(function () {
    // Protected routes
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('users.dashboard');
    Route::post('/subscribe/{plan}', [PlanController::class, 'subscribe'])->name('subscribe');

    // For assigning roles to users
    Route::post('/assign-role', [RoleController::class, 'assignRole'])->name('assign.role');
    Route::post('/store-user', [UserController::class, 'store'])->name('store.user')->middleware('plan.limit:users');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/user-create', [UserController::class, 'create'])->name('users.create');
    Route::get('/user-edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/user-destroy/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::put('/user-update/{id}', [UserController::class, 'update'])->name('users.update');

    Route::get('/user-logout', [LoginController::class, 'userLogout'])->name('userLogout');
    Route::get('/user-profile', [UserController::class, 'viewProfile'])->name('viewProfie');
    Route::post('updateProfile', [UserController::class, 'updateProfile'])->name('updateProfile');

    Route::get('/clear-all', [UserController::class, 'clearAll'])->name('clearAll');


    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/roles-create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/roles-store', [UserController::class, 'store'])->name('roles.store');
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
        Route::get('/', [ServiceController::class, 'index'])->name('index');
        Route::get('/create', [ServiceController::class, 'create'])->name('create');
        Route::post('/', [ServiceController::class, 'store'])->name('store');
        Route::get('/{service}/edit', [ServiceController::class, 'edit'])->name('edit');
        Route::put('/{service}', [ServiceController::class, 'update'])->name('update');
        Route::delete('/{service}', [ServiceController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('positions')->name('positions.')->group(function () {
        Route::get('/', [PositionController::class, 'index'])->name('index');
        Route::get('/create', [PositionController::class, 'create'])->name('create');
        Route::post('/', [PositionController::class, 'store'])->name('store');
        Route::get('/{position}/edit', [PositionController::class, 'edit'])->name('edit');
        Route::put('/{position}', [PositionController::class, 'update'])->name('update');
        Route::delete('/{position}', [PositionController::class, 'destroy'])->name('destroy');
    });

    Route::get('/properties', [PropertyController::class, 'index'])->name('properties.index');

    Route::prefix('properties')->name('properties.')->middleware('plan.limit:properties')->group(function () {
        Route::get('/create', [PropertyController::class, 'create'])->name('create');
        Route::post('/', [PropertyController::class, 'store'])->name('store');
        Route::get('/{property}/edit', [PropertyController::class, 'edit'])->name('edit');
        Route::put('/{property}', [PropertyController::class, 'update'])->name('update');
        Route::delete('/{property}', [PropertyController::class, 'destroy'])->name('destroy');
    });
    Route::get('/properties/{property}', [PropertyController::class, 'show'])->name('properties.show');

    Route::get('/tenants', [TenantController::class, 'index'])->name('tenants.index');

    Route::prefix('tenants')->name('tenants.')->middleware('plan.limit:tenants')->group(function () {
        Route::get('/create', [TenantController::class, 'create'])->name('create');
        Route::post('/', [TenantController::class, 'store'])->name('store');
        Route::get('/{tenant}/edit', [TenantController::class, 'edit'])->name('edit');
        Route::put('/{tenant}', [TenantController::class, 'update'])->name('update');
        Route::delete('/{tenant}', [TenantController::class, 'destroy'])->name('destroy');
    });

    Route::get('/tenants/{tenant}', [TenantController::class, 'show'])->name('tenants.show');

    Route::get('/tenants/services/{id?}', [TenantserviceController::class, 'services'])->name('tenants.services');

    Route::prefix('tenantServices')->name('tenantServices.')->group(function () {
        Route::get('/create', [TenantserviceController::class, 'create'])->name('create');
        Route::post('/', [TenantserviceController::class, 'store'])->name('store');
        Route::get('/{tenantService}/edit', [TenantserviceController::class, 'edit'])->name('edit');
        Route::put('/{tenantService}', [TenantserviceController::class, 'update'])->name('update');
        Route::delete('/{tenantService}', [TenantserviceController::class, 'destroy'])->name('destroy');
    });

    Route::get('/invoice', [TenantserviceController::class, 'invoice'])->name('sendInvoice');
    Route::get('/invoice/change/{id?}', [InvoiceController::class, 'invoiceChange'])->name('invoice.change');
    Route::get('/invoice/send/{id?}', [InvoiceController::class, 'sendInvoice'])->name('invoice.send');

    Route::get('/month/change/{id?}', [TenantController::class, 'monthChange'])->name('month.change');

    Route::prefix('costs')->name('costs.')->group(function () {
        Route::get('/', [CostController::class, 'index'])->name('index');
        Route::get('/create', [CostController::class, 'create'])->name('create');
        Route::post('/', [CostController::class, 'store'])->name('store');
        Route::get('/{cost}', [CostController::class, 'show'])->name('show');
        Route::get('/{cost}/edit', [CostController::class, 'edit'])->name('edit');
        Route::put('/{cost}', [CostController::class, 'update'])->name('update');
        Route::delete('/{cost}', [CostController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('reports')->name('reports.')->group(function () {
            Route::get('/costs', [ReportController::class, 'costs'])->name('costs');
            Route::post('/costs/filter', [ReportController::class, 'filterCosts'])->name('filterCosts');
            Route::get('/costs/reset', [ReportController::class, 'resetCosts'])->name('resetCosts');
            Route::get('/payments', [ReportController::class, 'payments'])->name('payments');
            Route::post('/payments/filter', [ReportController::class, 'filterPayments'])->name('filterPayments');
            Route::get('/payments/reset', [ReportController::class, 'resetPayments'])->name('resetPayments');
    });

    Route::get('/tenant-payment/{tenant}/{month}', [ReportController::class, 'markPaid'])->name('tenant.payment');
    Route::get('/tenant-payment-reverse/{tenant}/{month}', [ReportController::class, 'reverse'])->name('tenant.paymentReverse');

});

// Plans & Subscription routes
Route::get('/plans', [PlanController::class, 'index'])->name('plans');

// Public routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

// Organizations routes
Route::middleware(['auth'])->group(function () {
    Route::get('/organization', [OrganizationController::class, 'index'])->name('organizations.index');
    Route::get('/organization/create', [OrganizationController::class, 'create'])->name('organizations.create');
    Route::post('/organization/store', [OrganizationController::class, 'store'])->name('organizations.store');
    Route::delete('/organization/{id}', [OrganizationController::class, 'destroy'])->name('organizations.destroy');
    Route::get('/organization/{id}/edit', [OrganizationController::class, 'edit'])->name('organizations.edit');
    Route::put('/organization/{id}', [OrganizationController::class, 'update'])->name('organizations.update');
    Route::get('organization/user', [OrganizationUserController::class, 'index'])->name('organizationUser.index');
    Route::get('organization/user/create', [OrganizationUserController::class, 'create'])->name('organizationUser.create');
    Route::post('organization/user/store', [OrganizationUserController::class, 'store'])->name('organizationUser.store');
});
