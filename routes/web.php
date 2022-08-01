<?php

use App\Http\Controllers\SubscriberUserController;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\Route;

// Admin Controllers
use App\Http\Controllers\AdminControllers\CouponController;
use App\Http\Controllers\AdminControllers\DashboardController;
use App\Http\Controllers\AdminControllers\CategoryController;
use App\Http\Controllers\AdminControllers\StoreController;
use App\Http\Controllers\AdminControllers\EventController;
use App\Http\Controllers\AdminControllers\WidgetController;
use App\Http\Controllers\AdminControllers\UserController;
use App\Http\Controllers\AdminControllers\SliderController;
use App\Http\Controllers\AdminControllers\SettingController;
use App\Http\Controllers\AdminControllers\TinyMCEController;
use App\Http\Controllers\AdminControllers\SubscriberController;
use App\Http\Controllers\AdminControllers\AdminContactController;
use App\Http\Controllers\AdminControllers\AdminPagesController;

// User Controllers
use App\Http\Controllers\ExtensionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\TopCouponsController;
use App\Http\Controllers\ExpiredSoonCouponsController;
use App\Http\Controllers\SingleEventController;
use App\Http\Controllers\FrontStoreController;
use App\Http\Controllers\FrontCategoryController;
use App\Http\Controllers\FrontCouponController;
use App\Http\Controllers\FrontEventOrStoreController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\InstallationController;
use App\Http\Controllers\SitemapController;

use App\Models\Store;
use App\Models\Coupon;
use Illuminate\Http\Request;

Route::get('test2d', function () {

    Store::all()->map(function ($store) {
        \App\Models\Review::create([
           'store_id' => $store->id,
            'review' => '5.0',
            'date' => now()
        ]);
    });
});
//Route::get('test2d', function () {
//
//    \App\Models\Category::all()->map(
//        function ($category) {
//                    $category->slug = trim(str_replace(' ', '-', $category->name), '-');
//                    $category->save();
//                }
//    );
//
//});
//Route::get('test2d', function () {
//
//    $all_website_images = Storage::files('public/media');
//    $stores = Store::all();
//
//    $stores->map(function (Store $store) use ($all_website_images) {
//        $websiteid = DB::table('mycoupons.website')
//                        ->where('WebsiteName', '=', $store->name)->first()->WebsiteID;
//
//
//        $theImageToStore = collect(preg_grep("+public\/media\/$websiteid.*\..*+", $all_website_images))->first();
//        \App\Models\Image::create([
//            'name' => $theImageToStore,
//            'path' => $theImageToStore,
//            'imageable_id' => $store->id,
//            'imageable_type' => 'App\Models\Store',
//        ]);
//
//        Storage::copy($theImageToStore, 'public/images/markets/'. $theImageToStore);
//
//    });
//
////    dd($matches);
//
//});

Route::get('azexsupport.php', ExtensionController::class);

// Admin Dashboard Routes
Route::name('admin.')->prefix('admin')->middleware(['auth', 'admin_permissions'])->group(function () {
    Route::get('/', DashboardController::class)->name('index');
    Route::resource('contacts', AdminContactController::class)->only(['index', 'destroy']);

    Route::resource('pages', AdminPagesController::class);

    Route::get('coupons/{offer}/editoffer', [CouponController::class, 'editoffer'])->name('coupons.editoffer');
    // Route::patch('coupons/{offer}/editoffer', [CouponController::class, 'update'])->name('coupons.update');
    Route::get('coupons/createoffer', [CouponController::class, 'createoffer'])->name('coupons.createoffer');
    Route::get('coupons/offers', [CouponController::class, 'offers'])->name('coupons.offers');

    Route::resource('coupons', CouponController::class);
    Route::post('attach_coupons', [CouponController::class, 'attach_coupons'])->name('coupons.attach_coupons');
    Route::post('coupons/online_change/{coupon}', [CouponController::class, 'online_change'])->name('coupons.online_change');

    Route::resource('stores', StoreController::class);
    Route::post('stores/online_change/{store}', [StoreController::class, 'online_change'])->name('stores.online_change');
    Route::post('stores/coupons_action', [StoreController::class, 'coupons_action'])->name('stores.coupons_action');
    Route::post('stores/offers_action', [StoreController::class, 'offers_action'])->name('stores.offers_action');
    Route::get('stores/search', [StoreController::class, 'index'])->name('stores.search');

    Route::resource('events', EventController::class);

    Route::resource('categories', CategoryController::class);
    Route::post('categories/coupons_action', [CategoryController::class, 'coupons_action'])->name('categories.coupons_action');
    Route::post('categories/offers_action', [CategoryController::class, 'offers_action'])->name('categories.offers_action');

    Route::resource('widgets', WidgetController::class)->except(['show']);

    // Uploadig images using timymce
    Route::post('upload_tiny_image/{folder}', [TinyMCEController::class, 'upload_tiny_image'])->name('upload_tiny_image');

    Route::resource('users', UserController::class);

    Route::get('subscribers', [SubscriberController::class, 'index'])->name('subscribers');
    Route::get('phone_subscribers', [SubscriberController::class, 'phone_subscribers'])->name('phone_subscribers');

    // Home Slider Routes
    Route::get('slider', [SliderController::class, 'index'])->name('slider.index');
    Route::post('slider', [SliderController::class, 'update'])->name('slider.update');

    // Setting
    Route::get('setting', [SettingController::class, 'index'])->name('setting.index');
    Route::get('setting/homedeals', [SettingController::class, 'home'])->name('setting.homedeals');
    Route::get('setting/top_voucher_codes', [SettingController::class, 'topVoucherCodes'])->name('setting.top_voucher_codes');
    Route::get('setting/footer', [SettingController::class, 'footer'])->name('setting.footer');

    Route::post('setting', [SettingController::class, 'update'])->name('setting.update');
    Route::post('setting/homedeals', [SettingController::class, 'updatehomedeals'])->name('setting.updatehomedeals');
    Route::post('setting/top_voucher_codes', [SettingController::class, 'updateTopVoucherCodes'])->name('setting.updatetopvouchercodes');
    Route::post('setting/footer', [SettingController::class, 'updateFooter'])->name('setting.updatefooter');

    Route::get('export_db', [SettingController::class, 'our_backup_database'])->name('setting.export_db');
});

require __DIR__.'/auth.php';


// ------------------ Insalling Routes ------------------

Route::get('install', [InstallationController::class, 'installView'])->name('install_view');
Route::post('install', [InstallationController::class, 'install'])->name('install');
Route::post('import_db', [InstallationController::class, 'importDB'])->name('import_db');


Route::get('/go/{id}', function($id) {
    $store = Store::findOrFail($id);
    return redirect()->route('stores_events.show', $store->slug);
});
Route::get('open_coupon/{coupon}', function(Coupon $coupon, Request $request)  {
    return $coupon->offer ? redirect($coupon->link)
        : redirect()
            ->route('stores_events.show', [
                'slug' => $coupon->store->slug, 'couponCode' => $coupon->code, 'couponId' => $coupon->id
            ]);
})->name('open_coupon');


// Home Route

Route::post('subscribers', [SubscriberUserController::class, 'store']);
Route::get('subscribers/xlsx', [SubscriberUserController::class, 'exportUserAsXlsx']);

Route::get('/', HomeController::class)->name('home.index');
Route::get('search', [FrontCouponController::class, 'search'])->name('home.search');
Route::post('subscribe', [NewsLetterController::class, 'subscribe'])->name('subscribe');
Route::post('phone_subscribe', [NewsLetterController::class, 'phone_subscribe'])->name('phone_subscribe');

// top and expired coupons
Route::get('topcoupons', [TopCouponsController::class, 'index'])->name('topcoupons.index');
Route::get('inscadenza', [ExpiredSoonCouponsController::class, 'index'])->name('expiredsoon.index');
// contact routes & terms_conditions & privacy
Route::get('contatti', [ContactController::class, 'index'])->name('contact.index');
Route::post('contatti', [ContactController::class, 'store'])->name('contact.store');

Route::post('/', [HomeController::class, 'coupons_suggestion'])->name('coupons_suggestion');

Route::get('sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

// Check Coupon
Route::post('check_coupon', [FrontCouponController::class, 'check_coupon'])->name('coupon.check');

// Stores Route
Route::get('stores', [FrontStoreController::class, 'index'])->name('stores.index');

// Categories Route
Route::get('categories', [FrontCategoryController::class, 'index'])->name('categories.index');
Route::get('coupons/{category:slug}', [FrontCategoryController::class, 'show'])->name('categories.show');

Route::post('{store}', [FrontStoreController::class, 'rate'])->name('stores.rate');
Route::get('{slug}', [FrontEventOrStoreController::class, 'show'])->name('stores_events.show');


