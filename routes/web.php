<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GangSheetController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\DtfController;
use App\Http\Controllers\DTFuploadController;
use App\Http\Controllers\ProductSyncController;
use App\Http\Controllers\ShopController;



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
    $categories = \App\Models\Category::with('products')->get();
    $products = \App\Models\Product::with('category')->where('stock', '>', 0)->where('category_id','15')->take(30)->get();
    $blanks = \App\Models\Product::with('category')->where('stock', '>', 0)->where('category_id','15')->take(4)->get();

    return view('home', compact('categories', 'products','blanks'));
});
    

Route::get('/about', function () {
    return view('about');
});

Route::get('/gangsheetTest', function () {
    return view('gangsheet.builder');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/cart', function () {
    return view('cart');
});
Route::get('/checkout', function () {
    return view('checkout');
});



Route::get('/shop/category/{slug}', [ShopController::class, 'category'])->name('shop.category');

Route::get('/shop', function () {

    //$categories = \App\Models\Category::with('products')->get();
    $products = \App\Models\Product::with('category')->paginate(24);



    $categories = \App\Models\Category::withCount('products')->get();

    $availability = [
        'in_stock'  => \App\Models\ProductVariant::where('stock', '>', 0)->count(),
        'out_stock' => \App\Models\ProductVariant::where('stock', '=', 0)->count(),
    ];

    $sizes = \App\Models\ProductVariant::where('type', 'Size')
                ->select('variant_name','type')
                ->distinct()
                ->pluck('variant_name');

    $colors = \App\Models\ProductVariant::where('type', 'Color')
                ->select('variant_name','type')
                ->distinct()
                ->pluck('variant_name');
     $brands = \App\Models\Product::select('brand')
    ->whereNotNull('brand')
    ->groupBy('brand')
    ->selectRaw('brand, COUNT(*) as product_count')
    ->get();

    return view('shop', compact('categories', 'products', 'availability', 'sizes', 'colors','brands'));
});
// For AJAX pagination (returns JSON or HTML)
Route::get('/products/fetch', [GangSheetController::class, 'fetch'])->name('products.fetch');

Route::post('/products/sort', [GangSheetController::class, 'sort'])->name('products.sort');
// routes/web.php
Route::get('/products/filter', [GangSheetController::class, 'filter'])->name('products.filter');

Route::get('/product/{slug}', [\App\Http\Controllers\ProductController::class, 'show'])->name('product.show');

/*
Route::get('/product-detail', function () {
    return view('product-detail');
});
*/
Route::get('/wishlist', function () {
    return view('wishlist');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');



// User Routes

Route::middleware(['auth'])->group(function () {

    Route::post('/cart/add', [CartController::class, 'saveToCart'])->name('cart.add');
Route::get('/cart/show', [CartController::class, 'showCart'])->name('cart.show');
Route::post('/cart/mini/update', [CartController::class, 'updateCart'])->name('cart.update');
Route::delete('/cart/delete/{index}', [CartController::class, 'deleteCart'])->name('cart.delete');

   Route::get('/product/{id}/processed-image', [GangSheetController::class, 'getProcessedImage']);
   
    Route::get('/gang-sheet/{product}', [GangSheetController::class, 'builder'])->name('gangsheet.builder');
Route::post('/gang-sheet/save-to-cart', [GangSheetController::class, 'saveToCart'])->name('gangsheet.saveToCart');

// Cart actions (session-based)
Route::post('/cart/update', [CartController::class, 'update'])->name('new.cart.update');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('new.cart.remove');


// checkout endpoint example (simple)
Route::post('/checkout/place', [CartController::class, 'place'])->name('checkout.place');
Route::post('/checkout/create-intent', [CartController::class, 'createIntent'])->name('checkout.createIntent');

Route::get('/order/{id}', [CartController::class, 'orderDetails'])->name('order.details');

Route::get('/orders', [CartController::class, 'orders'])->name('user.orders');

Route::get('/orders/{order}/invoice', [CartController::class, 'downloadInvoice'])
     ->name('order.invoice.download');


    Route::get('/profile', [ShopController::class, 'profile'])->name('user.profile');
    Route::get('/profile/edit', [ShopController::class, 'editProfile'])->name('profile.edit');
    Route::post('/profile/update', [ShopController::class, 'updateProfile'])->name('profile.update');
     Route::post('/profile/password', [ShopController::class, 'updatePassword'])->name('profile.password');


Route::view('/thank-you', 'thankyou')->name('thankyou');



Route::get('/gangsheet', [\App\Http\Controllers\CustomGangsheetController::class, 'index'])->name('custom.gangsheet');

Route::post('/custom/gangsheet/save', [\App\Http\Controllers\CustomGangsheetController::class, 'save'])
    ->name('custom.gangsheet.save');

    Route::post('/gangsheet/save-to-cart', [\App\Http\Controllers\GangSheetController::class, 'saveGangsheetToCart'])
    ->name('custom.gangsheet.cart.save');


    Route::get('/dtf/upload-gangsheet', [DTFuploadController::class, 'index'])->name('dtf-gangsheet.index');
Route::post('/dtf/upload-gangsheet/calculate', [DtfuploadController::class, 'calculate'])->name('dtf-gangsheet.calculate');
Route::post('/dtf/upload-gangsheet/add-to-cart', [DtfuploadController::class, 'addToCart'])->name('dtf-gangsheet.addToCart');


Route::get('/dtf/transfer_by_size', [DtfController::class, 'index'])->name('dtf.index');
Route::post('/dtf/calculate', [DtfController::class, 'calculate'])->name('dtf.calculate');
Route::post('/dtf/add-to-cart', [DtfController::class, 'addToCart'])->name('dtf.addToCart');


});

// routes/web.php





// Admin Routes

// web.php
Route::get('/admin/sync/start', [ProductSyncController::class, 'startSync']);
Route::get('/admin/sync/batch', [ProductSyncController::class, 'syncBatch']);

Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index')->middleware('admin');
Route::resource('/admin/users', UserController::class)->middleware('admin');

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

     Route::get('/settings', [App\Http\Controllers\Admin\OrderController::class, 'settings'])->name('admin.settings');
    Route::post('/update/settings', [App\Http\Controllers\Admin\OrderController::class, 'updatesettings'])->name('admin.settings.update');

    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('products', App\Http\Controllers\Admin\ProductController::class);
    Route::post('/ss/sync', [\App\Http\Controllers\Admin\SSSyncController::class, 'syncProducts'])->name('ss.sync');
     Route::resource('orders', OrderController::class)->only([
        'index','show','destroy'
    ]);
    Route::patch('orders/{order}/status', [OrderController::class,'updateStatus'])->name('orders.updateStatus');
    Route::get('reports', [\App\Http\Controllers\Admin\ReportController::class, 'index'])->name('reports.index');
    Route::get('reports/export/csv', [\App\Http\Controllers\Admin\ReportController::class, 'exportCsv'])->name('reports.export.csv');


        Route::resource('customers', \App\Http\Controllers\Admin\CustomerController::class);


Route::get('/order/{order}/download-item/{item}', [OrderController::class, 'downloadImage'])
    ->name('order.download.item');



    Route::get('/best-sellers', [DashboardController::class, 'bestSellers']);
    Route::get('/low-stock-products', [DashboardController::class, 'lowStockProducts']);
    Route::get('/visitor-data', [DashboardController::class, 'visitorData']);
    Route::get('/latest/order', [DashboardController::class, 'latestOrders']);
    Route::get('/get/Monthly/Revenue', [DashboardController::class, 'monthlyRevenue']);
    Route::get('/get/Yearly/Revenue', [DashboardController::class, 'yearly']);
    Route::get('/fetch-gross-profit-data', [DashboardController::class, 'grossProfit']);
    Route::get('/fetch-revenue-vs-cogs', [DashboardController::class, 'revenueVsCogs']);
    Route::get('/fetch-sales-category-subcategory', [DashboardController::class, 'salesByCategory']);


         //Route::get('//admin/latest/order', [App\Http\Controllers\Admin\OrderController::class, 'settings'])->name('admin.settings');



    






    //DTF Module ADmin SIde

    Route::resource('dtf-sizes', \App\Http\Controllers\Admin\DtfSizeController::class);
    Route::resource('dtf-colors', \App\Http\Controllers\Admin\DtfColorController::class);
    Route::resource('dtf-images', \App\Http\Controllers\Admin\DtfImageController::class);




    Route::post('/products/sync-ss', [\App\Http\Controllers\Admin\ProductController::class, 'sync'])
    ->name('products.sync');
    

});



// routes/web.php
Route::prefix('admin/reports')->middleware(['auth','admin'])->prefix('admin')->group(function () {
    Route::get('/reports/sales', [ReportController::class, 'sales'])->name('admin.reports.sales');
    Route::get('/reports/sales/export', [ReportController::class, 'exportSales'])->name('admin.reports.sales.export');

    Route::get('/reports/product-reports', [ReportController::class, 'products'])->name('admin.reports.products');
    Route::get('/reports/products/export', [ReportController::class, 'exportProducts'])->name('admin.reports.products.export');

    Route::get('/reports/bestsellers', [ReportController::class, 'bestsellers'])->name('admin.reports.bestsellers');
    Route::get('/reports/bestsellers/export', [ReportController::class, 'exportBestSellers'])->name('admin.reports.bestsellers.export');

    Route::get('/reports/daily', [ReportController::class, 'daily'])->name('admin.reports.daily');
    Route::get('/reports/daily/export', [ReportController::class, 'exportDaily'])->name('admin.reports.daily.export');

    Route::get('/reports/monthly', [ReportController::class, 'monthly'])->name('admin.reports.monthly');
    Route::get('/reports/monthly/export', [ReportController::class, 'exportMonthly'])->name('admin.reports.monthly.export');
});



