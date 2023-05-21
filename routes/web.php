<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BlogPosts\adminBlogPosts;
use App\Http\Controllers\Admin\ManageCategory\manageCategoryController;
use App\Http\Controllers\Admin\ProductRequest\productRequestController;
use App\Http\Controllers\Admin\Products\productController;
use App\Http\Controllers\Admin\UI\ui;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainSite\adoption;
use App\Http\Controllers\MainSite\blogPosts;
use App\Http\Controllers\MainSite\Home;
use App\Http\Controllers\MainSite\loginValidation;
use App\Http\Controllers\MainSite\mainCategories;
use App\Http\Controllers\MainSite\mainSiteDashboard;
use App\Http\Controllers\MainSite\mainSiteProduct;
use App\Models\MainCategoriesModel;
use App\Models\ProductModel;
use App\Models\productRequestModal;
use App\Models\requestModal;
use Illuminate\Support\Facades\Artisan;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('admin/', [LoginController::class, 'AdminloginForm']);
Route::post('admin/login', [LoginController::class, 'AdminloginValidation']);
// admin 
Route::middleware('adminCheck')->prefix('/admin')->group(function () {
    // admin validations
    Route::get('/dashboard', [LoginController::class, 'adminDashboard']);
    // admin slide
    Route::get('/ui/slider/add', [ui::class, 'AddSliderForm'])->name('AddSliderForm')->middleware('adminCheck');
    Route::post('/ui/slider/add', [ui::class, 'AddSlider'])->name('AddSlider')->middleware('adminCheck');
    Route::get('/ui/slider/list', [ui::class, 'sliderList'])->name('sliderList')->middleware('adminCheck');
    Route::get('/ui/slide/edit/{id}', [ui::class, 'editSliderForm'])->name('editSliderForm')->middleware('adminCheck');
    Route::post('/ui/slide/edit', [ui::class, 'editSlider'])->name('editSlider')->middleware('adminCheck');
    Route::post('/ui/slide/delete', [ui::class, 'deletslide'])->name('deletslide')->middleware('adminCheck');
    // admin main catergory
    Route::get('/category/list', [manageCategoryController::class, 'listCat'])->name('listCat')->middleware('adminCheck');
    Route::get('/category/add', [manageCategoryController::class, 'addCatForm'])->name('addCatForm')->middleware('adminCheck');
    Route::post('/category/add', [manageCategoryController::class, 'addCat'])->name('addCat')->middleware('adminCheck');
    Route::get('/category/edit/{id}', [manageCategoryController::class, 'editCatForm'])->name('editCatForm')->middleware('adminCheck');
    Route::post('/category/edit', [manageCategoryController::class, 'editCat'])->name('editCat')->middleware('adminCheck');
    Route::post('/category/delete', [manageCategoryController::class, 'deleteCat'])->name('deleteCat')->middleware('adminCheck');
    //admin posts tags
    Route::get('/posts/tags', [adminBlogPosts::class, 'listTags'])->name('listTags')->middleware('adminCheck');
    Route::get('/posts/tags/add', [adminBlogPosts::class, 'addTagForm'])->name('addTagForm')->middleware('adminCheck');
    Route::post('/posts/tags/add', [adminBlogPosts::class, 'addTag'])->name('addTag')->middleware('adminCheck');
    Route::get('/posts/tags/edit/{id}', [adminBlogPosts::class, 'editTagForm'])->name('editTagForm')->middleware('adminCheck');
    Route::post('/posts/tags/edit', [adminBlogPosts::class, 'editTag'])->name('editTag')->middleware('adminCheck');
    Route::post('/posts/tags/delete', [adminBlogPosts::class, 'deleteTag'])->name('deleteTag')->middleware('adminCheck');
    // admin posts
    Route::get('/posts', [adminBlogPosts::class, 'listPost'])->name('listPost')->middleware('adminCheck');
    Route::get('/posts/add', [adminBlogPosts::class, 'addPostsForm'])->name('addPostsForm')->middleware('adminCheck');
    Route::post('/posts/add', [adminBlogPosts::class, 'addPost'])->name('addPost')->middleware('adminCheck');
    Route::get('/posts/edit/{id}', [adminBlogPosts::class, 'editPostForm'])->name('editPostForm')->middleware('adminCheck');
    Route::post('/posts/edit', [adminBlogPosts::class, 'editPost'])->name('editPost')->middleware('adminCheck');
    Route::post('/posts/delete', [adminBlogPosts::class, 'deletePost'])->name('deletePost')->middleware('adminCheck');
    // admin products
    Route::get('/products/list', [productController::class, 'listProducts'])->name('listProducts')->middleware('adminCheck');
    Route::get('/products/add', [productController::class, 'addProductsForm'])->name('addProductsForm')->middleware('adminCheck');
    Route::post('/products/add', [productController::class, 'addProduct'])->name('addProduct')->middleware('adminCheck');
    Route::post('/products/delete', [productController::class, 'deleteProducts'])->name('deleteProducts')->middleware('adminCheck');
    Route::get('/products/edit/{id}', [productController::class, 'editForm'])->name('editForm')->middleware('adminCheck');
    Route::post('/products/edit', [productController::class, 'editProuct'])->name('editProuct')->middleware('adminCheck');
    // admin request
    Route::get('/requests', [productRequestController::class, 'listRequest'])->name('listRequest')->middleware('adminCheck');
});

Route::get('subCatAjax', [productController::class, 'renderCats'])->name('renderCats')->middleware('adminCheck');





Route::get('/logout', [LoginController::class, 'logout'])->middleware('adminCheck');


Route::get('/', [Home::class, 'home']);
