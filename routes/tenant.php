<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Tenant\CompanyController;

Route::get('company/store',[CompanyController::class,'store'])->name('company.store');

Route::get('/',function(){

return response()->json('tenant 01');
});