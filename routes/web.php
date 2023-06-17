<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\BuyController;
use App\Http\Controllers\CampaignPageController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\DiscountpageController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\OfferPageController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaymentpageController;
use App\Http\Controllers\PrivacyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RefundController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ShippingpageController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\SocialPageController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\TimerController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishlistController;
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
Route::get('/', [FrontendController::class, 'home'])->name('site');
Route::get('/product/quick/view/{product_id}', [FrontendController::class, 'product_quick_view'])->name('product_quick_view');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// User
Route::get('/user/profile', [UserController::class, 'profile'])->name('profile');
Route::post('/user/profile/update', [UserController::class, 'profile_update'])->name('profile.update');
Route::get('/user/list', [UserController::class, 'users'])->name('users');
Route::get('/user/delete/{user_id}', [UserController::class, 'user_delete'])->name('user.delete');
Route::post('/user/register', [UserController::class, 'user_register'])->name('user.register');
// Route::get('/user/edit/{user_id}', [UserController::class, 'user_edit'])->name('user.edit');
Route::post('/user/update', [UserController::class, 'user_update'])->name('user.update');
Route::post('/editUser', [UserController::class, 'editUser'])->name('editUser');

// Category
Route::get('/category/add', [CategoryController::class, 'category_add'])->name('category.add');
Route::get('/category/list', [CategoryController::class, 'category_list'])->name('category.list');
Route::post('/category/store', [CategoryController::class, 'category_store'])->name('category.store');
Route::get('/category/edit/{category_id}', [CategoryController::class, 'category_edit'])->name('category.edit');
Route::get('/category/delete/{category_id}', [CategoryController::class, 'category_delete'])->name('category.delete');
Route::post('/category/update/', [CategoryController::class, 'category_update'])->name('category.update');

// Color
Route::get('/color/add', [ColorController::class, 'color_add'])->name('color.add');
Route::post('/color/store', [ColorController::class, 'color_store'])->name('color.store');
Route::get('/color/list', [ColorController::class, 'color_list'])->name('color.list');
Route::get('/color/delete/{color_id}', [ColorController::class, 'color_delete'])->name('color.delete');

// Size
Route::get('/size/add', [SizeController::class, 'size_add'])->name('size.add');
Route::post('/size/store', [SizeController::class, 'size_store'])->name('size.store');
Route::get('/size/list', [SizeController::class, 'size_list'])->name('size.list');
Route::get('/size/delete/{size_id}', [SizeController::class, 'size_delete'])->name('size.delete');

// Brand
Route::get('/brand/add', [BrandController::class, 'brand_add'])->name('brand.add');
Route::post('/brand/store', [BrandController::class, 'brand_store'])->name('brand.store');
Route::get('/brand/list', [BrandController::class, 'brand_list'])->name('brand.list');
Route::get('/brand/delete/{brand_id}', [BrandController::class, 'brand_delete'])->name('brand.delete');
Route::get('/brand/edit/{brand_id}', [BrandController::class, 'brand_edit'])->name('brand.edit');
Route::post('/brand/update', [BrandController::class, 'brand_update'])->name('brand.update');

// Product
Route::get('/product/add', [ProductController::class, 'product_add'])->name('product.add');
Route::post('/product/store', [ProductController::class, 'product_store'])->name('product.store');
Route::get('/product/list', [ProductController::class, 'product_list'])->name('product.list');
Route::get('/product/delete/{product_id}', [ProductController::class, 'product_delete'])->name('product.delete');
Route::get('/product/edit/{product_id}', [ProductController::class, 'product_edit'])->name('product.edit');
Route::post('/product/update', [ProductController::class, 'product_update'])->name('product.update');


// Product timer
Route::get('/timer/add', [TimerController::class, 'timer_add'])->name('timer.add');
Route::post('/timer/store', [TimerController::class, 'timer_store'])->name('timer.store');


// Role management system
Route::get('/role/add', [RoleController::class, 'role'])->name('role');
Route::post('/permission/store', [RoleController::class, 'perimission_store'])->name('permission.store');

/******* Frontend start here *********/
// category
Route::get('/category/single/{category_id}', [FrontendController::class, 'category_one'])->name('category.one');
Route::get('/category', [FrontendController::class, 'category_two'])->name('category');

// shop


// offer
Route::get('/offer', [FrontendController::class, 'offer'])->name('offer');

// campaign
Route::get('/campaign', [FrontendController::class, 'campaign'])->name('campaign');

// Customer authentication
Route::post('/customer/auth/register', [CustomerAuthController::class, 'customer_auth_register'])->name('customer.auth.register');
Route::post('/customer/auth/login', [CustomerAuthController::class, 'customer_auth_login'])->name('customer.auth.login');
Route::get('/customer/auth/logout', [CustomerAuthController::class, 'customer_auth_logout'])->name('customer.logout');
Route::get('/customer/profile', [CustomerAuthController::class, 'customer_profile'])->name('customer.profile');
Route::post('/customer/profile/update', [CustomerAuthController::class, 'customer_profile_update'])->name('customer.profile.update');

// Product details 
Route::get('/product/details/{slug}', [DetailsController::class, 'product_details'])->name('product.details');
Route::post('/get_size', [DetailsController::class, 'getSize']);
Route::post('/quick_get_size', [DetailsController::class, 'quick_get_size']);


// Cart
Route::post('/add-to-cart', [CartController::class, 'cart_store']);
Route::post('/quick-to-cart', [CartController::class, 'quick_cart_store']);
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::get('/load-cart-data', [CartController::class, 'cartloadbyajax']);
Route::post('/update-to-cart', [CartController::class, 'update_cart']);
Route::delete('/delete-from-cart', [CartController::class, 'delete_from_cart']);
Route::get('/clear-cart', [CartController::class, 'clear_cart']);
Route::post('/add_single_cart', [CartController::class, 'cart_single_store']);


// Buy 
// Route::post('/buy/now/store', [BuyController::class, 'buy_now_store'])->route('buy.now.store');


// Checkout
Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');


// Order
Route::post('/order/store', [CheckoutController::class, 'order_store'])->name('order.store');
Route::get('/order/success', [CheckoutController::class, 'order_success'])->name('order.success');
Route::post('/order/status', [CheckoutController::class, 'order_status'])->name('order.status');

// Coupon
Route::get('/coupon/add', [CouponController::class, 'coupon_add'])->name('coupon.add');
Route::get('/coupon/delete/{coupon_id}', [CouponController::class, 'coupon_delete'])->name('coupon.delete');
Route::get('/coupon/edit/{coupon_id}', [CouponController::class, 'coupon_edit'])->name('coupon.edit');
Route::get('/coupon/list', [CouponController::class, 'coupon_list'])->name('coupon.list');
Route::post('/coupon/store', [CouponController::class, 'coupon_store'])->name('coupon.store');
Route::post('/coupon/update', [CouponController::class, 'coupon_update'])->name('coupon.update');
Route::post('/check-coupon-code', [CouponController::class, 'check_coupon_code']);


// Wishlist
Route::post('/add-wishlist', [WishlistController::class, 'add_wishlist']);
Route::get('/wishlist', [WishlistController::class, 'wishlist'])->name('wishlist');
Route::delete('/delete-from-wishlist', [WishlistController::class, 'delete_from_wishlist']);
Route::post('/wishlist-to-cart', [WishlistController::class, 'wishlist_to_cart']);
Route::get('/wishlist/clear', [WishlistController::class, 'wishlist_clear'])->name('wishlist.clear');


// Buy
Route::post('/buy/store', [BuyController::class, 'buy_store'])->name('buy.store');
Route::post('/quick/buy/store', [BuyController::class, 'quick_buy_store'])->name('quick.buy.store');


// Shop
Route::get('/shop', [ShopController::class, 'shop'])->name('shop');
Route::post('/shop/filter', [ShopController::class, 'shop_filter'])->name('shop.filter');

// Contact
Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
Route::post('/contact/message', [ContactController::class, 'contact_message'])->name('contact.message');
Route::get('/contact/list', [ContactController::class, 'contact_list'])->name('contact.list');
Route::get('/contact/message/delete/{message_id}', [ContactController::class, 'contact_message_delete'])->name('contact.message.delete');
Route::post('/contactMessage', [ContactController::class, 'contactMessage']);
Route::get('/contact/delete/all', [ContactController::class, 'contact_delete_all'])->name('contact.delete.all');
Route::get('/contact/info', [ContactController::class, 'contact_info'])->name('contact.info');
Route::post('/contact/info/store', [ContactController::class, 'contact_info_store'])->name('contact.info.store');
Route::get('/contact/info/list', [ContactController::class, 'contact_info_list'])->name('contact.info.list');
Route::get('/contact/info/delete/{contact_id}', [ContactController::class, 'contact_info_delete'])->name('contact.info.delete');
Route::get('/contact/info/edit/{contact_id}', [ContactController::class, 'contact_info_edit'])->name('contact.info.edit');
Route::post('/contact/info/update', [ContactController::class, 'contact_info_update'])->name('contact.info.update');
Route::get('/contact/info/status/{status_id}', [ContactController::class, 'contact_info_status'])->name('contact.info.status');
// Route::get('/contact/message', [ContactController::class, 'contact_message'])->name('contact.message');

// Setting
Route::get('/setting/info', [SettingController::class, 'setting_info'])->name('setting.info');
Route::get('/setting/info/list', [SettingController::class, 'setting_info_list'])->name('setting.info.list');
Route::post('/setting/info/store', [SettingController::class, 'setting_info_store'])->name('setting.info.store');
Route::get('/setting/delete/{setting_id}', [SettingController::class, 'setting_delete'])->name('setting.delete');
Route::get('/setting/edit/{setting_id}', [SettingController::class, 'setting_edit'])->name('setting.edit');
Route::post('/setting/update', [SettingController::class, 'setting_update'])->name('setting.update');
Route::get('/setting/info/status/{setting_id}', [SettingController::class, 'setting_info_status'])->name('setting.info.status');

// Socials 
Route::get('/setting/socials', [SocialPageController::class, 'socials'])->name('socials');
Route::post('/setting/social/store', [SocialPageController::class, 'social_store'])->name('social.store');
Route::get('/setting/social/delete/{social_id}', [SocialPageController::class, 'social_delete'])->name('social.delete');


// Transactions
Route::get('/transaction/info', [TransactionController::class, 'transaction_info'])->name('transaction.info');
Route::post('/transaction/info/store', [TransactionController::class, 'transaction_info_store'])->name('transaction.info.store');
Route::get('/transaction/info/delete/{transaction_id}', [TransactionController::class, 'transaction_info_delete'])->name('transaction.info.delete');
Route::get('/transaction/list', [TransactionController::class, 'transaction_list'])->name('transaction.list');
Route::get('/transaction/show/{transaction_id}', [TransactionController::class, 'transaction_show'])->name('transaction.show');


//////page design
// Index page
Route::get('/page/index', [PageController::class, 'index_page'])->name('index.page');
Route::get('/page/offer', [OfferPageController::class, 'offer_page'])->name('offer.page');
Route::post('/index/info/store', [PageController::class, 'index_info_store'])->name('index.info.store');
Route::get('/index/info/delete/{index_id}', [PageController::class, 'index_info_delete'])->name('index.info.delete');
Route::get('/index/info/edit/{index_id}', [PageController::class, 'index_info_edit'])->name('index.info.edit');
Route::post('/index/info/update', [PageController::class, 'index_info_update'])->name('index.info.update');

// Offer page
Route::post('/offer/info/store', [OfferPageController::class, 'offer_info_store'])->name('offer.info.store');
Route::get('/offer/info/delete/{offer_id}', [OfferPageController::class, 'offer_info_delete'])->name('offer.info.delete');
Route::get('/offer/info/edit/{offer_id}', [OfferPageController::class, 'offer_info_edit'])->name('offer.info.edit');
Route::post('/offer/info/update', [OfferPageController::class, 'offer_info_update'])->name('offer.info.update');

// campaign page
Route::get('/page/campaign', [CampaignPageController::class, 'campaign_page'])->name('campaign.page');
Route::post('/campaign/info/store', [CampaignPageController::class, 'campaign_info_store'])->name('campaign.info.store');
Route::get('/campaign/info/delete/{offer_id}', [CampaignPageController::class, 'campaign_info_delete'])->name('campaign.info.delete');
Route::get('/campaign/info/edit/{offer_id}', [CampaignPageController::class, 'campaign_info_edit'])->name('campaign.info.edit');
Route::post('/campaign/info/update', [CampaignPageController::class, 'campaign_info_update'])->name('campaign.info.update');


// discount page
Route::get('/page/discount', [DiscountpageController::class, 'discount_page'])->name('discount.page');
Route::post('/page/validity/store', [DiscountpageController::class, 'validity_store'])->name('validity.store');
Route::get('/page/validity/delete/{validity_id}', [DiscountpageController::class, 'validity_info_delete'])->name('validity.info.delete');


// subscribe
Route::post('/subscribe/store', [SubscribeController::class, 'subscribe_store'])->name('subscribe.store');
Route::get('/subscribe/list', [SubscribeController::class, 'subscribe_list'])->name('subscribe.list');
Route::get('/subscribe/delete/{sub_id}', [SubscribeController::class, 'subscribe_delete'])->name('subscriber.delete');

// Faq
Route::get('/faq', [FaqController::class, 'faq'])->name('faq');
Route::get('/page/faq/info', [FaqController::class, 'faq_info'])->name('faq.info');
Route::post('/shipping/info/store', [FaqController::class, 'shipping_info_store'])->name('shipping.info.store');
Route::get('/shipping/info/delete/{shipping_id}', [FaqController::class, 'shipping_info_delete'])->name('shipping.info.delete');
Route::post('/order/return/info/store', [FaqController::class, 'order_return_info_store'])->name('order.return.info.store');
Route::get('/order/return/info/delete/{delete_id}', [FaqController::class, 'order_return_info_delete'])->name('order.return.info.delete');
Route::post('/payments/info/store', [FaqController::class, 'payments_info_store'])->name('payments.info.store');
Route::get('/payments/info/delete/{delete_id}', [FaqController::class, 'payments_info_delete'])->name('payments.info.delete');

// Privacy policy
Route::get('/privacy', [FrontendController::class, 'privacy'])->name('privacy');
Route::get('/page/privacy', [PrivacyController::class, 'privacy_page'])->name('privacy.page');
Route::post('/privacy/info/store', [PrivacyController::class, 'privacy_info_store'])->name('privacy.info.store');
Route::get('/privacy/info/delete/{delete_id}', [PrivacyController::class, 'privacy_info_delete'])->name('privacy.info.delete');
Route::get('/privacy/info/edit/{edit_id}', [PrivacyController::class, 'privacy_info_edit'])->name('privacy.info.edit');
Route::post('/privacy/info/update', [PrivacyController::class, 'privacy_info_update'])->name('privacy.info.update');

// Help 
Route::get('/help', [FrontendController::class, 'help'])->name('help');
Route::get('/page/help', [HelpController::class, 'help_page'])->name('help.page');
Route::post('/help/info/store', [HelpController::class, 'help_info_store'])->name('help.info.store');
Route::get('/help/info/delete/{delete_id}', [HelpController::class, 'help_info_delete'])->name('help.info.delete');
Route::get('/help/info/edit/{edit_id}', [HelpController::class, 'help_info_edit'])->name('help.info.edit');
Route::post('/help/info/update', [HelpController::class, 'help_info_update'])->name('help.info.update');

// Terms & Conditions
Route::get('/terms', [FrontendController::class, 'terms'])->name('terms');
Route::get('/page/terms', [TermsController::class, 'terms_page'])->name('terms.page');
Route::post('/terms/info/store', [TermsController::class, 'terms_info_store'])->name('terms.info.store');
Route::get('/terms/info/delete/{delete_id}', [TermsController::class, 'terms_info_delete'])->name('terms.info.delete');
Route::get('/terms/info/edit/{edit_id}', [TermsController::class, 'terms_info_edit'])->name('terms.info.edit');
Route::post('/terms/info/update', [TermsController::class, 'terms_info_update'])->name('terms.info.update');

// Refund policy
Route::get('/refund', [FrontendController::class, 'refund'])->name('refund');
Route::get('/page/refund', [RefundController::class, 'refund_page'])->name('refund.page');
Route::post('/refund/info/store', [RefundController::class, 'refund_info_store'])->name('refund.info.store');
Route::get('/refund/info/delete/{delete_id}', [RefundController::class, 'refund_info_delete'])->name('refund.info.delete');
Route::get('/refund/info/edit/{edit_id}', [RefundController::class, 'refund_info_edit'])->name('refund.info.edit');
Route::post('/refund/info/update', [RefundController::class, 'refund_info_update'])->name('refund.info.update');

// website policy
Route::get('/website', [FrontendController::class, 'website'])->name('website');
Route::get('/page/website', [SiteController::class, 'website_page'])->name('website.page');
Route::post('/website/info/store', [SiteController::class, 'website_info_store'])->name('website.info.store');
Route::get('/website/info/delete/{delete_id}', [SiteController::class, 'website_info_delete'])->name('website.info.delete');
Route::get('/website/info/edit/{edit_id}', [SiteController::class, 'website_info_edit'])->name('website.info.edit');
Route::post('/website/info/update', [SiteController::class, 'website_info_update'])->name('website.info.update');

// payments method
Route::get('/paymentsite', [FrontendController::class, 'paymentsite'])->name('paymentsite');
Route::get('/page/payments', [PaymentpageController::class, 'payments_page'])->name('payments.page');
Route::post('/payment/info/store', [PaymentpageController::class, 'payment_info_store'])->name('payment.info.store');
Route::get('/payment/info/delete/{delete_id}', [PaymentpageController::class, 'payment_info_delete'])->name('payment.info.delete');
Route::get('/payment/info/edit/{edit_id}', [PaymentpageController::class, 'payment_info_edit'])->name('payment.info.edit');
Route::post('/payment/info/update', [PaymentpageController::class, 'payment_info_update'])->name('payment.info.update');

// Shipping guide
Route::get('/shippingsite', [FrontendController::class, 'shippingsite'])->name('shippingsite');
Route::get('/page/shipping', [ShippingpageController::class, 'shipping_page'])->name('shipping.page');
Route::post('/shipping/info/store', [ShippingpageController::class, 'shipping_info_store'])->name('shipping.info.store');
Route::get('/shipping/delete/{delete_id}', [ShippingpageController::class, 'shipping_delete'])->name('shipping.delete');
Route::get('/shipping/edit/{edit_id}', [ShippingpageController::class, 'shipping_edit'])->name('shipping.edit');
Route::post('/shipping/info/update', [ShippingpageController::class, 'shipping_info_update'])->name('shipping.info.update');

// Sitemap
Route::get('/map', [FrontendController::class, 'map'])->name('map');
Route::get('/page/map/info', [MapController::class, 'map_page'])->name('map.info');
Route::post('/map/info/store', [MapController::class, 'map_info_store'])->name('map.info.store');
Route::get('/map/delete/{delete_id}', [MapController::class, 'map_delete'])->name('map.delete');