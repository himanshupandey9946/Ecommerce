<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\SizeController;






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

Route::get('/', function () {
    return view('welcome');
});

//Product route Start
Route::get('product_list',[ProductController::class,'list']);


Route::get('product_add',[ProductController::class,'add']);
Route::post('product_add',[ProductController::class,'insert']);
Route::get('/product_edit/{id}',[ProductController::class,'edit']);
Route::post('/product_update/{id}',[ProductController::class,'update']);
Route::get('/product_delete/{id}',[ProductController::class,'delete']);
Route::get('/productattr_delete/{paid}/{pid}',[ProductController::class,'attrdelete']);
Route::get('/productimage_delete/{piid}/{pid}',[ProductController::class,'deleteimage']);





//Product route End
//-----------------------------------------------------------------------------------------------------------//

Route::get('/brand_list',[BrandController::class,'list']);
Route::get('/brand_add',[BrandController::class,'add']);
//Route::post('brand_add',[BrandController::class,'insert']);
Route::get('/brand_edit/{id}',[BrandController::class,'edit']);
Route::post('/brand_edit/{id}',[BrandController::class,'edit']);
Route::get('/brand_delete/{id}',[BrandController::class,'delete']);
//--------------------------------------------------------------------------------------------------Brand------//


//Color Route Start
Route::get('/color_list',[ColorController::class,'list']);
Route::get('/color_add',[ColorController::class,'add']);
Route::post('/color_insert',[ColorController::class,'insert']);
Route::get('/color_edit/{id}',[ColorController::class,'edit']);
Route::post('/color_update/{id}',[ColorController::class,'update']);
Route::get('/color_delete/{id}',[ColorController::class,'delete']);
//Color Route end

//Size Route Start
Route::get('/size_list',[SizeController::class,'list']);
Route::get('/size_add',[SizeController::class,'add']);
Route::post('/size_insert',[SizeController::class,'insert']);
Route::get('/size_edit/{id}',[SizeController::class,'edit']);
Route::post('/size_update/{id}',[SizeController::class,'update']);
Route::get('/size_delete/{id}',[SizeController::class,'delete']);
//Size Route end







//----------------------------------------------------------------------------------------------------------------------//
//Main Category Route Start
Route::get('/dashboard',[UserController::class,'index']);
Route::get('/main_category',[AdminController::class,'main_category']);
Route::get('/addmaincategory',[AdminController::class,'addmaincategory']);
Route::post('add_main_category',[AdminController::class,'add_main_category']);
Route::get('/delete_main_category/{id}',[AdminController::class,'delete_main_category']);
Route::get('/update_main_category/{id}',[AdminController::class,'update_main_category']);
Route::post('/edit_main_category/{id}',[AdminController::class,'edit_main_category']);
Route::get('/canceladdmaincategory',[AdminController::class,'canceladdmaincategory']);
Route::get('/cancelmainupdatecategory',[AdminController::class,'cancelmainupdatecategory']);
//Main Category Route End
//-----------------------------------------------------------------------------------------------------------//
/*Category Route Start*/
Route::get('/category',[AdminController::class,'category']);
Route::get('/addcategory',[AdminController::class,'addcategory']);
Route::post('add_category',[AdminController::class,'add_category']);
Route::get('/delete_category/{id}',[AdminController::class,'delete_category']);
Route::get('/update_category/{id}',[AdminController::class,'update_category']);
Route::post('/edit_category/{id}',[AdminController::class,'edit_category']);
Route::get('/cancelcategory',[AdminController::class,'cancelcategory']);
Route::get('/cancelupdatecategory',[AdminController::class,'cancelupdatecategory']);
/*Category Route End*/
//-----------------------------------------------------------------------------------------------------------//
//Sub -Category Route Start
Route::get('/subcategory',[AdminController::class,'subcategory']);
Route::get('/addsubcategory',[AdminController::class,'addsubcategory']);
Route::post('add_sub_category',[AdminController::class,'add_sub_category']);
Route::get('/delete_sub_category/{id}',[AdminController::class,'delete_sub_category']);
Route::get('/update_sub_category/{id}',[AdminController::class,'update_sub_category']);
Route::post('/edit_sub_category/{id}',[AdminController::class,'edit_sub_category']);
Route::get('/cancelsubcategory',[AdminController::class,'cancelsubcategory']);
Route::get('/cancelsubupdatecategory',[AdminController::class,'cancelsubupdatecategory']);
//Sub - Category Route End 
//-----------------------------------------------------------------------------------------------------------//










