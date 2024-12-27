<?php


use App\Http\Controllers\AboutController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\BannerController;


use App\Http\Controllers\SeoController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MissionVisionController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductCategoryTitleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RetailController;
use Illuminate\Support\Facades\Artisan;

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
// / Define routes using the HomeController
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/retail', [HomeController::class, 'retail'])->name('retail');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/productdetail/{product}', [HomeController::class, 'productdetail'])->name('productdetail');
// Route::get('/', [HomeController::class, 'index'])->name('frontend.index');
// Route::get('/detail/{product}', [HomeController::class, 'detail'])->name('frontend.detail');
Route::get('/thankyou', [HomeController::class, 'thankyou'])->name('thankyou');




Route::get('login-form', [AuthController::class, 'index'])->name('login-form');
Route::get('registration', [AuthController::class, 'registration'])->name('registration');
//Route::post('store', [AuthController::class, 'store'])->name('auth.store');
Route::post('auth-store', [AuthController::class, 'store'])->name('auth-store');
Route::post('login', [AuthController::class, 'login'])->name('auth.login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('forget', [AuthController::class, 'forget'])->name('auth.forget');
Route::post('forget', [AuthController::class, 'forget_pass'])->name('auth.forget_pass');
Route::get('reset-password', [AuthController::class, 'reset_password'])->name('reset-password');
Route::post('store-password', [AuthController::class, 'store_password'])->name('store-password');

Route::post('appointment/store', [AppointmentController::class, 'store'])->name('appointment.store');
Route::get('product/qr/{product}', [ProductController::class, 'showQr'])->name('product.qr');
Route::get('/categories/{id}', [HomeController::class, 'show'])->name('category.details');
Route::get('/change-password', [AuthController::class, 'showChangePasswordForm'])->name('auth.change-password-form');
Route::post('/update-password', [AuthController::class, 'updatePassword'])->name('auth.update-password');

Route::get('dashboard', [AuthController::class, 'dashboard'])
    ->middleware(['auth'])
    ->name('auth.dashboard');

Route::group(['middleware' => ['auth']], function () {
    Route::get('index', [BannerController::class, 'index'])->name('banner.index');
    Route::get('create', [BannerController::class, 'create'])->name('banner.create');
    Route::post('store', [BannerController::class, 'store'])->name('banner.store');
    Route::get('edit/{banner}', [BannerController::class, 'edit'])->name('banner.edit');
    Route::get('delete/{banner}', [BannerController::class, 'delete'])->name('banner.delete');
    Route::get('duplicate/{banner}', [BannerController::class, 'duplicate'])->name('banner.duplicate');
    Route::post('update/{banner}', [BannerController::class, 'update'])->name('banner.update');

    //  about

    Route::get('about/index', [AboutController::class, 'index'])->name('about.index');
    Route::get('about/create', [AboutController::class, 'create'])->name('about.create');
    Route::post('about/store', [AboutController::class, 'store'])->name('about.store');
    Route::get('about/edit/{about}', [AboutController::class, 'edit'])->name('about.edit');
    Route::get('about/delete/{about}', [AboutController::class, 'delete'])->name('about.delete');
    Route::get('about/duplicate/{about}', [AboutController::class, 'duplicate'])->name('about.duplicate');
    Route::post('about/update/{about}', [AboutController::class, 'update'])->name('about.update');



    //contact


    Route::get('contact/index', [ContactController::class, 'index'])->name('contact.index');
    Route::get('contact/create', [ContactController::class, 'create'])->name('contact.create');
    Route::post('contact/store', [ContactController::class, 'store'])->name('contact.store');
    Route::get('contact/edit/{contact}', [ContactController::class, 'edit'])->name('contact.edit');
    Route::get('contact/delete/{contact}', [ContactController::class, 'delete'])->name('contact.delete');
    Route::get('contact/duplicate/{contact}', [ContactController::class, 'duplicate'])->name('contact.duplicate');
    Route::post('contact/update/{contact}', [ContactController::class, 'update'])->name('contact.update');



    // retial


    Route::get('retails/index', [RetailController::class, 'index'])->name('retails.index');
    Route::get('retails/create', [RetailController::class, 'create'])->name('retails.create');
    Route::post('retails/store', [RetailController::class, 'store'])->name('retails.store');
    Route::get('retails/edit/{retails}', [RetailController::class, 'edit'])->name('retails.edit');
    Route::get('retails/delete/{retails}', [RetailController::class, 'delete'])->name('retails.delete');
    Route::get('retails/duplicate/{retails}', [RetailController::class, 'duplicate'])->name('retails.duplicate');
    Route::post('retails/update/{retails}', [RetailController::class, 'update'])->name('retails.update');


    //missionVision


    Route::get('missionVision/index', [MissionVisionController::class, 'index'])->name('missionVision.index');
    Route::get('missionVision/create', [MissionVisionController::class, 'create'])->name('missionVision.create');
    Route::post('missionVision/store', [MissionVisionController::class, 'store'])->name('missionVision.store');
    Route::get('missionVision/edit/{missionVision}', [MissionVisionController::class, 'edit'])->name('missionVision.edit');
    Route::get('missionVision/delete/{missionVision}', [MissionVisionController::class, 'delete'])->name('missionVision.delete');
    Route::get('missionVision/duplicate/{missionVision}', [MissionVisionController::class, 'duplicate'])->name('missionVision.duplicate');
    Route::post('missionVision/update/{missionVision}', [MissionVisionController::class, 'update'])->name('missionVision.update');


    // Appointment

    Route::get('appointment/index', [AppointmentController::class, 'index'])->name('appointment.index');
    Route::get('appointment/create', [AppointmentController::class, 'create'])->name('appointment.create');
    Route::get('appointment/edit/{appointment}', [AppointmentController::class, 'edit'])->name('appointment.edit');
    Route::post('appointment/update/{appointment}', [AppointmentController::class, 'update'])->name('appointment.update');
    Route::get('appointment/delete/{appointment}', [AppointmentController::class, 'delete'])->name('appointment.delete');
    Route::get('appointment/duplicate/{appointment}', [AppointmentController::class, 'duplicate'])->name('appointment.duplicate');


     //product
     Route::get('productCategory/index', [ProductCategoryController::class, 'index'])->name('productCategory.index');
     Route::get('productCategory/create', [ProductCategoryController::class, 'create'])->name('productCategory.create');
     Route::post('productCategory/store', [ProductCategoryController::class, 'store'])->name('productCategory.store');
     Route::get('productCategory/edit/{productCategory}', [ProductCategoryController::class, 'edit'])->name('productCategory.edit');
     Route::post('productCategory/update/{productCategory}', [ProductCategoryController::class, 'update'])->name('productCategory.update');
     Route::get('productCategory/delete/{productCategory}', [ProductCategoryController::class, 'delete'])->name('productCategory.delete');
     Route::get('productCategory/duplicate/{productCategory}', [ProductCategoryController::class, 'duplicate'])->name('productCategory.duplicate');



    //product
    Route::get('product/index', [ProductController::class, 'index'])->name('product.index');
    Route::get('product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('product/edit/{product}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('product/update/{product}', [ProductController::class, 'update'])->name('product.update');
    Route::get('product/delete/{product}', [ProductController::class, 'delete'])->name('product.delete');
    Route::get('product/duplicate/{product}', [ProductController::class, 'duplicate'])->name('product.duplicate');




    //testimonial

    Route::get('testimonial/index', [TestimonialController::class, 'index'])->name('testimonial.index');
    Route::get('testimonial/create', [TestimonialController::class, 'create'])->name('testimonial.create');
    Route::post('testimonial/store', [TestimonialController::class, 'store'])->name('testimonial.store');
    Route::get('testimonial/edit/{testimonial}', [TestimonialController::class, 'edit'])->name('testimonial.edit');
    Route::post('testimonial/update/{testimonial}', [TestimonialController::class, 'update'])->name('testimonial.update');
    Route::get('testimonial/delete/{testimonial}', [TestimonialController::class, 'delete'])->name('testimonial.delete');
    Route::get('testimonial/duplicate/{testimonial}', [TestimonialController::class, 'duplicate'])->name('testimonial.duplicate');


    // teams

    Route::get('team/index', [TeamController::class, 'index'])->name('team.index');
    Route::get('team/create', [TeamController::class, 'create'])->name('team.create');
    Route::post('team/store', [TeamController::class, 'store'])->name('team.store');
    Route::get('team/edit/{team}', [TeamController::class, 'edit'])->name('team.edit');
    Route::post('team/update/{team}', [TeamController::class, 'update'])->name('team.update');
    Route::get('team/delete/{team}', [TeamController::class, 'delete'])->name('team.delete');
    Route::get('team/duplicate/{team}', [TeamController::class, 'duplicate'])->name('team.duplicate');






    Route::get('blogs/index', [\App\Http\Controllers\BlogController::class, 'index'])->name('blogs.index');
    Route::get('blogs/create', [\App\Http\Controllers\BlogController::class, 'create'])->name('blogs.create');
    Route::post('blogs/store', [\App\Http\Controllers\BlogController::class, 'store'])->name('blogs.store');
    Route::get('blogs/edit/{blog}', [\App\Http\Controllers\BlogController::class, 'edit'])->name('blogs.edit');
    Route::post('blogs/update/{blog}', [\App\Http\Controllers\BlogController::class, 'update'])->name('blogs.update');
    Route::get('blogs/delete/{blog}', [\App\Http\Controllers\BlogController::class, 'delete'])->name('blogs.delete');
    Route::get('blogs/duplicate/{blog}', [\App\Http\Controllers\BlogController::class, 'duplicate'])->name('blogs.duplicate');

    //    //counter

    Route::get('seo/index', [SeoController::class, 'index'])->name('seo.index');
    Route::get('seo/create', [SeoController::class, 'create'])->name('seo.create');
    Route::post('seo/store', [SeoController::class, 'store'])->name('seo.store');
    Route::get('seo/edit/{seo}', [SeoController::class, 'edit'])->name('seo.edit');
    Route::post('seo/update/{seo}', [SeoController::class, 'update'])->name('seo.update');
    Route::get('seo/delete/{seo}', [SeoController::class, 'delete'])->name('seo.delete');
    Route::get('seo/duplicate/{seo}', [SeoController::class, 'duplicate'])->name('seo.duplicate');


    Route::get('productCategoryTitle/index', action: [ProductCategoryTitleController::class, 'index'])->name('productCategoryTitle.index');
    Route::get('productCategoryTitle/create', [ProductCategoryTitleController::class, 'create'])->name('productCategoryTitle.create');
    Route::post('productCategoryTitle/store', [ProductCategoryTitleController::class, 'store'])->name('productCategoryTitle.store');
    Route::get('productCategoryTitle/edit/{productCategoryTitle}', [ProductCategoryTitleController::class, 'edit'])->name('productCategoryTitle.edit');
    Route::post('productCategoryTitle/update/{productCategoryTitle}', [ProductCategoryTitleController::class, 'update'])->name('productCategoryTitle.update');
    Route::get('productCategoryTitle/delete/{productCategoryTitle}', [ProductCategoryTitleController::class, 'delete'])->name('productCategoryTitle.delete');
    Route::get('productCategoryTitle/duplicate/{productCategoryTitle}', [ProductCategoryTitleController::class, 'duplicate'])->name('productCategoryTitle.duplicate');


});






Route::get('/foo', function () {
    $exitCode = Artisan::call('storage:link');
    if ($exitCode === 0) {
        return 'Success';
    } else {
        return 'Failed'; // You can customize this message as needed
    }
});
