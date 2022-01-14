<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productController;
use App\Http\Controllers\userController;
use GuzzleHttp\Middleware;

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

Route::view("/welcome", "welcome");
Route::view("/test", "test");

Route::view("/user", "user");
Route::get('autocomplete', [productController::class, 'autocomplete'])->name('autocomplete');

Route::post("register", [userController::class, "register"]);
Route::view("login", "login");
Route::post("login", [userController::class, "login"]);
Route::get("admin_login", [userController::class, "admin_login"]);
Route::get("admin", [userController::class, "admin"]);
Route::post("edit", [productController::class, "edit"]);
Route::post("update", [productController::class, "update"]);
Route::view("add_page", "add_page");
Route::post("add", [productController::class, "add"]);
Route::post("drop_product", [productController::class, "drop_product"]);
Route::get("/", [productController::class, "index"]);
Route::get("category/{category}", [productController::class, "category"]);
Route::get("detail/{product_id}", [productController::class, "detail"]);
Route::view("help", "help");
Route::get("search", [productController::class, "search"]);
Route::get("add_to_cart/{product_id}", [productController::class, "add_to_cart"]);
Route::get("remove_from_cart/{product_id}", [productController::class, "remove_from_cart"]);
Route::post("order", [productController::class, "order"]);
Route::post("ordered", [productController::class, "ordered"]);
Route::get("order_list", [productController::class, "order_list"]);
Route::post("rate",[productController::class,"rate"]);
Route::get("logout", function () {
    session()->forget("user");
    return redirect("/");
});
Route::get("admin_logout", function () {
    session()->forget("admin");
    return view("admin_login");
});
