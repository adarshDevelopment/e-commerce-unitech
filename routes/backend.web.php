<?php
use \App\Http\Controllers\Backend;

Route::group(['prefix'=>'backend/parent', 'as'=>'backend.parent.'],function(){
    Route::resource('/tag', \App\Http\Controllers\Backend\TagController::class);
    Route::resource('/address_type', \App\Http\Controllers\Backend\AddressTypeController::class);
    Route::resource('/category', \App\Http\Controllers\Backend\CategoryController::class);
    Route::resource('/attribute', \App\Http\Controllers\Backend\AttributeController::class);
    Route::resource('/specification', \App\Http\Controllers\Backend\SpecificationController::class);
    Route::resource('/subcategory', \App\Http\Controllers\Backend\SubcategoryController::class);

});

Route::group(['prefix'=>'backend/acl','as'=>'backend.acl.'],function(){
    // route to call assignForm function to assign permissions to roles
    Route::get('/role/assign_form/{id}', [\App\Http\Controllers\Backend\RoleController::class, 'assignForm'])->name('role.assign_form');
    Route::post('/role/assign_permission', [\App\Http\Controllers\Backend\RoleController::class, 'assignPermission'])->name('role.assign_permission');


    Route::resource('/module', \App\Http\Controllers\Backend\ModuleController::class);
    Route::resource('/permission', \App\Http\Controllers\Backend\PermissionController::class);
    Route::resource('/role', \App\Http\Controllers\Backend\RoleController::class);

});

//route for AJAX call
Route::post('/category/getsubcategory', [\App\Http\Controllers\Backend\CategoryController::class,'getSubcategory'])->name('category.getsubcategory');

Route::get('backend', [App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('backend.dashboard.index');

Route::group(['prefix'=>'backend', 'as'=>'backend.'],function(){
    Route::get('/product/assign_price_form/{id}', [\App\Http\Controllers\Backend\ProductController::class, 'assignProductPrice'])->name('product.assign_price_form');
    Route::post('/product/assign_price', [\App\Http\Controllers\Backend\ProductController::class, 'assign_price'])->name('product.assign_price');
    Route::resource('product', \App\Http\Controllers\Backend\ProductController::class);
    Route::resource('user', \App\Http\Controllers\Backend\UserController::class);
    Route::resource('settings', \App\Http\Controllers\Backend\SettingsController::class);
//    Route::resource('', \App\Http\Controllers\Backend\DashboardController::class);

    Route::resource('order', \App\Http\Controllers\Backend\OrderController::class);
});

