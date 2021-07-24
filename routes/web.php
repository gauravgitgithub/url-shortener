<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/{link:shortened}', function(App\Models\Link $link) {
    if($link->is_for_single_use_only){
        if($link->is_expired){
            return abort(404);
        }else{
            $link->is_expired = true;
            $link->save();
        }
    }
    $link->increment('views');

    return redirect($link->original);
})->middleware('throttle:api')->name("links.show");