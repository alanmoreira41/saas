<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//$this->View('/404-tenant','erros.404-tenant')->name('404.tenant');
//$this->View('/404-tenant','errors.404_tenant')->name('tenant.404');





Route::get('/', function () {
    return view('welcome');
});
Route::get('/tenant_404',function(){
    return view('errors/404_tenant');
    
})->name('404.tenant');
/*
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

*/

