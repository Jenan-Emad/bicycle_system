<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\FAQuestionController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/parent', function (){
    return view('admin.parent');
});

Route::prefix('bicycle_system/')->group(function() {

    //login and register routes
    Route::get('login', function () {
        return view('login');
    })->name('login');

    Route::get('register', function () {
        return view('register');
    })->name('register');

    Route::post('check-login', [AuthenticationController::class, 'loginUser'])
    ->name('checkLogin');

    Route::post('check-register', [AuthenticationController::class, 'registerUser'])
    ->name('checkRegister');

    Route::get('redirect-by-role', function () {
    $user = Auth::user();

    return match ($user->role) {
        'admin' => redirect()->route('admin.parent'),
        'author' => redirect()->route('author.viewBlogs'),
        'customer' => redirect()->route('user.home'),
        default => abort(403),
    };
    })->name('redirect.by.role')->middleware('auth');

    Route::post('logout', [AuthenticationController::class, 'logoutUser'])
        ->name('logout');

    //admin routes
    //admin dashboard
    Route::get('parent', function (){
        return view('admin.parent');
    })->name('admin.dashboard');

    //admin user routes
    
    Route::get('createUser', [UserController::class, 'create'])->name('admin.createUser');
    Route::get('indexUsers', [UserController::class, 'index'])->name('admin.viewUsers');
    Route::post('storeUser', [UserController::class, 'store'])->name('admin.storeUser');
    Route::get('editUser/{id}', [UserController::class, 'edit'])->name('admin.editUser');
    Route::put('updateUser/{id}', [UserController::class, 'update'])->name('admin.updateUser');
    Route::delete('deleteUser/{id}', [UserController::class, 'destroy'])->name('admin.deleteUser');

    //admin brand routes
    Route::get('createBrand', [BrandController::class, 'create'])->name('admin.createBrand');
    Route::get('indexBrands', [BrandController::class, 'index'])->name('admin.viewBrands');
    Route::post('storeBrand', [BrandController::class, 'store'])->name('admin.storeBrand');
    Route::get('editBrand/{id}', [BrandController::class, 'edit'])->name('admin.editBrand');
    Route::put('updateBrand/{id}', [BrandController::class, 'update'])->name('admin.updateBrand');
    Route::delete('deleteBrand/{id}', [BrandController::class, 'destroy'])->name('admin.deleteBrand');

    //admin discount routes

    //admin service routes

    //admin category routes
    Route::get('createCategory', [CategoryController::class, 'create'])->name('admin.createCategory');
    Route::get('indexCategories', [CategoryController::class, 'index'])->name('admin.viewCategories');
    Route::post('storeCategory', [CategoryController::class, 'store'])->name('admin.storeCategory');
    Route::get('editCategory/{id}', [CategoryController::class, 'edit'])->name('admin.editCategory');
    Route::put('updateCategory/{id}', [CategoryController::class, 'update'])->name('admin.updateCategory');
    Route::delete('deleteCategory/{id}', [CategoryController::class, 'destroy'])->name('admin.deleteCategory');

    //admin faq routes
    Route::get('createFAQ', [FAQController::class, 'create'])->name('admin.createFAQ');
    Route::get('indexFAQ', [FAQController::class, 'index'])->name('admin.viewFAQs');
    Route::post('storeFAQ', [FAQController::class, 'store'])->name('admin.storeFQA');
    Route::get('editFAQ/{id}', [FAQController::class, 'edit'])->name('admin.editFAQ');
    Route::put('updateFAQ/{id}', [FAQController::class, 'update'])->name('admin.updateFAQ');
    Route::delete('deleteFAQ/{id}', [FAQController::class, 'destroy'])->name('admin.deleteFAQ');

    //admin product
    Route::get('createProduct', [ProductController::class, 'create'])->name('admin.createProduct');
    Route::get('indexProduct', [ProductController::class, 'index'])->name('admin.viewProducts');
    Route::post('storeProduct', [ProductController::class, 'store'])->name('admin.storeProduct');
    Route::get('editProduct/{id}', [ProductController::class, 'edit'])->name('admin.editProduct');
    Route::put('updateProduct/{id}', [ProductController::class, 'update'])->name('admin.updateProduct');
    Route::delete('deleteProduct/{id}', [ProductController::class, 'destroy'])->name('admin.deleteProduct');


    //admin discount
    Route::get('createDiscount', [DiscountController::class, 'create'])->name('admin.createDiscount');
    Route::get('indexDiscounts', [DiscountController::class, 'index'])->name('admin.viewDiscounts');
    Route::post('storeDiscount', [DiscountController::class, 'store'])->name('admin.storeDiscount');
    Route::get('editDiscount/{id}', [DiscountController::class, 'edit'])->name('admin.editDiscount');
    Route::put('updateDiscount/{id}', [DiscountController::class, 'update'])->name('admin.updateDiscount');
    Route::delete('deleteDiscount/{id}', [DiscountController::class, 'destroy'])->name('admin.deleteDiscount');

    //the other view routes


    //author routes


    //user routes
    Route::get('home', [HomeController::class, 'index'])->name('user.home');

    Route::get('shop', [ShopController::class, 'index'])->name('user.shop');

    Route::get('product/{id}', [ProductController::class, 'showProductForUser'])->name('user.product');

    Route::get('faqs', [FAQController::class, 'mostFrequentlyAsked'])->name('user.faq');

    Route::get('blogs', [BlogController::class, 'userIndex'])->name(name: 'user.blogs');

    Route::get('contact', [ContactController::class, 'index'])->name(name: 'user.contact');

    Route::post('contact/send', [ContactController::class, 'send'])->name(name: 'user.sendContact');

    Route::post('submit-question', [FAQuestionController::class, 'storeUserQuestion'])->name('user.submitQuestion');

    Route::get('services', [ServiceController::class, 'userIndex'])->name(name: 'user.services');

    Route::get('category_products/{id}', [ShopController::class, 'getProductsWithSpecificCategory'])->name('category.products');


});