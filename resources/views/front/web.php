<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\CMSController;
use App\Http\Controllers\AchivementController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LaneSlotController;
use App\Http\Controllers\DisableSlotController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\LaneController;
use App\Http\Controllers\SlotController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AppearanceController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\SlugController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\SchedualController;

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

Route::group(['middleware' => 'prevent-back-button'],function(){
    Route::get('/',[FrontController::class,'home'])->name('home');
    Route::get('book-a-lane',[FrontController::class,'lane'])->name('lane');
    Route::post('add-to-cart',[FrontController::class,'addTocart'])->name('add-to-cart');
   /* Route::get('/products',[FrontController::class,'products'])->name('products');
    Route::get('/shop',[FrontController::class,'shop'])->name('shop');
    Route::get('/product-details',[FrontController::class,'product_details'])->name('product-details');*/
    Route::get('/thank-you',[FrontController::class,'thankYou'])->name('thank-you'); 
    Route::get('/event-thank-you',[FrontController::class,'eventthankYou'])->name('event-thank-you'); 
    Route::get('/settings',[OptionController::class,'settings'])->name('settings');
    Route::post('/update-settings',[OptionController::class,'updateSettings'])->name('update-settings');
   Route::get('/delete-banner-image',[OptionController::class,'deleteBannerImage'])->name('delete-banner-image');
   /* Route::post('/get-categorywise-product',[FrontController::class,'categorywise_product'])->name('get-categorywise-product');

    Route::get('/products-chai-blends',[FrontController::class,'chani_brand'])->name('products-chai-blends');
    Route::get('/products-herbal-tea',[FrontController::class,'herbal_tea'])->name('products-herbal-tea');
    Route::get('/products-assorted-pack',[FrontController::class,'assorted_pack'])->name('products-assorted-pack');
    Route::get('/products-instant-tea-max',[FrontController::class,'instant_tea'])->name('products-instant-tea-max'); */

    
    
    

    //caRT
  /*  Route::get('cart', [CartController::class, 'cart'])->name('cart');
    Route::post('add-to-cart', [CartController::class, 'addToCart'])->name('add-to-cart');
    Route::get('remove-cart', [CartController::class, 'removeCart'])->name('remove-cart');
    Route::post('update-cart', [CartController::class, 'updateCart'])->name('update-cart');
    Route::get('/checkout',[CartController::class,'checkout'])->name('checkout'); */
    Route::get('/checkout',[CartController::class,'checkout'])->name('checkout');

    //Admin Routes
    Route::get('/admin',[AdminController::class,'admin'])->name('admin');
    Route::get('/dashboard',[AdminController::class,'dashboard'])->name('dashboard');
    Route::post('/admin-auth',[AdminController::class,'adminAuth'])->name('admin-auth');
    Route::get('/my-profile',[AdminController::class,'my_profile'])->name('my-profile');
    Route::get('/admin-change-password',[AdminController::class,'adminChangePassword'])->name('admin-change-password');
    Route::post('/update-admin-password',[AdminController::class,'updateAdminPassword'])->name('update-admin-password');
    Route::post('/update-profile',[AdminController::class,'update_profile'])->name('update-profile');
    Route::get('/logout',[AdminController::class,'logout'])->name('logout');

    Route::get('/add-event',[EventController::class,'addEvent'])->name('add-event');
    Route::post('/store-event',[EventController::class,'storeEvent'])->name('store-event');
    Route::get('/all-event',[EventController::class,'allEvent'])->name('all-event');
    Route::get('/edit-event',[EventController::class,'editEvent'])->name('edit-event');
    Route::post('/update-event',[EventController::class,'updateEvent'])->name('update-event');
    Route::get('/delete-event',[EventController::class,'deleteEvent'])->name('delete-event');
    Route::get('/change-event-status',[EventController::class,'changeaEventStatus'])->name('change-event-status');



    Route::get('/add-achivement',[AchivementController::class,'addAchivement'])->name('add-achivement');
    Route::post('/store-achivement',[AchivementController::class,'storeAchivement'])->name('store-achivement');
    Route::get('/all-achivement',[AchivementController::class,'allAchivement'])->name('all-achivement');
    Route::get('/edit-achivement',[AchivementController::class,'editAchivement'])->name('edit-achivement');
    Route::post('/update-achivement',[AchivementController::class,'updateAchivement'])->name('update-achivement');
    Route::get('/delete-achivement',[AchivementController::class,'deleteAchivement'])->name('delete-achivement');
    Route::get('/change-achivement-status',[AchivementController::class,'changeaAchivementStatus'])->name('change-achivement-status');


    Route::get('/add-media',[MediaController::class,'addMedia'])->name('add-media');
    
    Route::post('/store-media',[MediaController::class,'storeMedia'])->name('store-media');
    Route::get('/all-media',[MediaController::class,'allMedia'])->name('all-media');
    Route::get('/edit-media',[MediaController::class,'editMedia'])->name('edit-media');
    Route::post('/update-media',[MediaController::class,'updateMedia'])->name('update-media');
    Route::get('/delete-media',[MediaController::class,'deleteMedia'])->name('delete-media');
    Route::get('/change-media-status',[MediaController::class,'changeaMediaStatus'])->name('change-media-status');
    

    Route::get('/add-gallery',[MediaController::class,'addMedia'])->name('add-gallery');
    Route::get('/all-gallery',[MediaController::class,'allMedia'])->name('all-gallery');


    Route::get('/add-achivement',[AchivementController::class,'addAchivement'])->name('add-achivement');
    Route::post('/store-achivement',[AchivementController::class,'storeAchivement'])->name('store-achivement');
    Route::get('/all-achivement',[AchivementController::class,'allAchivement'])->name('all-achivement');
    Route::get('/edit-achivement',[AchivementController::class,'editAchivement'])->name('edit-achivement');
    Route::post('/update-achivement',[AchivementController::class,'updateAchivement'])->name('update-achivement');
    Route::get('/delete-achivement',[AchivementController::class,'deleteAchivement'])->name('delete-achivement');
    Route::get('/change-achivement-status',[AchivementController::class,'changeaAchivementStatus'])->name('change-achivement-status');


    Route::get('/add-lane-slot',[LaneSlotController::class,'addLaneSlot'])->name('add-lane-slot');
    Route::post('store-lane-slot',[LaneSlotController::class,'StoreLaneSlot'])->name('store-lane-slot');
    Route::any('manage-lane-slot',[LaneSlotController::class,'ManageLaneSlot'])->name('manage-lane-slot');
    Route::get('edit-lane-slot',[LaneSlotController::class,'EditLaneSlot'])->name('edit-lane-slot');
    Route::post('update-lane-slot',[LaneSlotController::class,'UpdateLaneSlot'])->name('update-lane-slot');
    Route::get('/delete-lane-slot',[LaneSlotController::class,'DeleteLaneSlot'])->name('delete-lane-slot');


    Route::get('/add-disable-slot',[DisableSlotController::class,'addDisableSlot'])->name('add-disable-slot');
    Route::post('store-disable-slot',[DisableSlotController::class,'StoreDisableSlot'])->name('store-disable-slot');
    Route::any('manage-disable-slot',[DisableSlotController::class,'ManageDisableSlot'])->name('manage-disable-slot');
    Route::get('edit-disable-slot',[DisableSlotController::class,'EditDisableSlot'])->name('edit-disable-slot');
    Route::post('update-disable-slot',[DisableSlotController::class,'UpdateDisableSlot'])->name('update-disable-slot');
    Route::get('/delete-disable-slot',[DisableSlotController::class,'DeleteDisableSlot'])->name('delete-disable-slot');
    
    
    //Pages Route0
    Route::get('/add-page',[CMSController::class,'addPage'])->name('add-page');
    Route::post('/store-page',[CMSController::class,'storePage'])->name('store-page');
    Route::get('/all-pages',[CMSController::class,'allPages'])->name('all-pages');
    Route::get('/edit-page',[CMSController::class,'editPage'])->name('edit-page');
    Route::post('/update-page',[CMSController::class,'updatePage'])->name('update-page');
    Route::get('/delete-page',[CMSController::class,'deletePage'])->name('delete-page');
    Route::get('/change-page-status',[CMSController::class,'changePageStatus'])->name('change-page-status');
    Route::get('/delete-page-image',[CMSController::class,'deletePageImage'])->name('delete-page-image');

    //Category Routes
    Route::get('/categories',[CategoryController::class,'categories'])->name('categories');
    /*Route::post('/store-category',[CategoryController::class,'storeCategory'])->name('store-category');
    
    Route::get('/edit-category',[CategoryController::class,'editCategory'])->name('edit-category');
    Route::post('/update-category',[CategoryController::class,'updateCategory'])->name('update-category');
    Route::post('/append-sub-category',[CategoryController::class,'appendSubCategory'])->name('append-sub-category');
    Route::get('/change-category-status',[CategoryController::class,'changeCategoryStatus'])->name('change-category-status');
    Route::get('/delete-category-image',[CategoryController::class,'deleteCategoryImage'])->name('delete-category-image');


    //Sub Category Routes
    Route::get('/sub-categories',[SubCategoryController::class,'subCategories'])->name('sub-categories');
    Route::post('/store-sub-category',[SubCategoryController::class,'storeSubCategory'])->name('store-sub-category');
    // Route::get('/delete-sub-category',[SubCategoryController::class,'deleteSubCategory'])->name('delete-sub-category');
    Route::get('/edit-sub-category',[SubCategoryController::class,'editSubCategory'])->name('edit-sub-category');
    Route::post('/update-sub-category',[SubCategoryController::class,'updateSubCategory'])->name('update-sub-category');
    Route::post('/changeSubCategoryStatus',[SubCategoryController::class,'changeSubCategoryStatus'])->name('changeSubCategoryStatus');
    Route::get('/change-sub-category-status',[SubCategoryController::class,'changeSubCategoryStatus'])->name('change-sub-category-status');
    Route::get('/delete-sub-category-image',[SubCategoryController::class,'deleteSubCategoryImage'])->name('delete-sub-category-image');

    //Product Routes
    Route::get('/all-products',[ProductController::class,'allProducts'])->name('all-products');
    Route::get('/add-product',[ProductController::class,'add_product'])->name('dd-product');

    Route::post('/store-product',[ProductController::class,'storeProduct'])->name('store-product');
    Route::get('/delete-product',[ProductController::class,'deleteProduct'])->name('delete-product');
    Route::get('/edit-product',[ProductController::class,'editProduct'])->name('edit-product');
    Route::post('/update-product',[ProductController::class,'updateProduct'])->name('update-product');
    Route::post('/append-attribute-data',[ProductController::class,'appendAttributeData'])->name('append-attribute-data');
    Route::post('/fetch-product-price',[ProductController::class,'fetchProductPrice'])->name('fetch-product-price');
    Route::post('/product-details',[ProductController::class,'productDetails'])->name('product-details');
    Route::get('/change-product-status',[ProductController::class,'changeProductStatus'])->name('change-product-status');
    Route::get('/delete-product-gallery-image',[ProductController::class,'deleteProductGalleryImage'])->name('delete-product-gallery-image');
    Route::post('/chnage-product-order',[ProductController::class,'chnageProductOrder'])->name('chnage-product-order');
    Route::post('/delete-product-variation',[ProductController::class,'deleteProductVariation'])->name('delete-product-variation');
    Route::post('/edit-product-variation',[ProductController::class,'editProductVariation'])->name('edit-product-variation');
    Route::post('/add-product-variation',[ProductController::class,'addProductVariation'])->name('add-product-variation');
    Route::post('/update-product-variation',[ProductController::class,'updateProductVariation'])->name('update-product-variation');
    
    Route::post('update-featured-image',[ProductController::class,'update_featured_image'])->name('update-featured-image');
    Route::post('update-single-featured-image',[ProductController::class,'update_single_featured_image'])->name('update-single-featured-image');

    //Edit Product Routes
    Route::post('/switch-single-to-variable-product',[ProductController::class,'switchSingleToVariableProduct'])->name('switch-single-to-variable-product');
    Route::post('/switch-variable-to-single-product',[ProductController::class,'switchVariableToSingleProduct'])->name('switch-variable-to-single-product'); */

    Route::get('/lanes',[LaneController::class,'lanes'])->name('lanes');
    Route::post('/store-lane',[LaneController::class,'storeLane'])->name('store-lane');
    Route::get('/delete-lane',[LaneController::class,'deleteLane'])->name('delete-lane');
    Route::get('/edit-lane',[LaneController::class,'editLane'])->name('edit-lane');
    Route::post('/update-lane',[LaneController::class,'updateLane'])->name('update-lane');
    Route::get('/change-lane-status',[LaneController::class,'changeLaneStatus'])->name('change-lane-status');
    
    
    // events
    Route::get('/events',[EventsController::class,'events']);
    Route::get('event-booking',[EventsController::class,'event_booking'])->name('event-booking');
    // Route::get('/meet-the-coaches',[PagesController::class,'pages']);
    // Route::get('/match-schedule',[SchedualController::class,'matchSchedule']);

    Route::get('/gallery',[EventsController::class,'gallery'])->name('gallery');
    
    
    // pages
    Route::get('/pages',[PagesController::class,'pages']);


    Route::get('/slots',[SlotController::class,'slots'])->name('slots');
    Route::post('/store-slot',[SlotController::class,'storeSlot'])->name('store-slot');
    Route::get('/delete-slot',[SlotController::class,'deleteSlot'])->name('delete-slot');
    Route::get('/edit-slot',[SlotController::class,'editSlot'])->name('edit-slot');
    Route::post('/update-slot',[SlotController::class,'updateSlot'])->name('update-slot');
    Route::get('/change-slot-status',[SlotController::class,'changeSlotStatus'])->name('change-slot-status');
    
    //Customer Routes
    Route::get('/customers',[CustomerController::class,'customers'])->name('customers');
    Route::post('/store-customer',[CustomerController::class,'storeCustomer'])->name('store-customer');
    Route::get('/delete-customer',[CustomerController::class,'deleteCustomer'])->name('delete-customer');
    Route::get('/edit-customer',[CustomerController::class,'editCustomer'])->name('edit-customer');
    Route::post('/update-customer',[CustomerController::class,'updateCustomer'])->name('update-customer');


    //Coach Routes
    Route::get('/coachs',[CoachController::class,'customers'])->name('coachs');
    Route::post('/store-coachs',[CoachController::class,'storeCustomer'])->name('store-coachs');
    Route::get('/delete-coachs',[CoachController::class,'deleteCustomer'])->name('delete-coachs');
    Route::get('/edit-coachs',[CoachController::class,'editCustomer'])->name('edit-coachs');
    Route::post('/update-coachs',[CoachController::class,'updateCustomer'])->name('update-coachs');
   
    Route::post('/registration',[CustomerController::class,'registration'])->name('registration');
    Route::post('/customer-auth',[CustomerController::class,'customerAuth'])->name('customer-auth');
    Route::get('/customer-dashboard',[CustomerController::class,'customerDashboard'])->name('customer-dashboard');
    Route::post('/update-my-profile',[CustomerController::class,'updateProfile'])->name('update-my-profile');
    Route::get('/my-orders',[CustomerController::class,'myOrders'])->name('my-orders');
    Route::get('/my-event-orders',[CustomerController::class,'myEventOrders'])->name('my-event-orders');
    Route::get('/my-order-details',[CustomerController::class,'myOrderDetails'])->name('my-order-details');
    Route::get('order-refund/{id}',[CustomerController::class,'orderRefund'])->name('order-refund');
    Route::get('event-order-refund/{id}',[CustomerController::class,'eventOrderRefund'])->name('event-order-refund');
    
    Route::get('/change-password',[CustomerController::class,'changePassword'])->name('change-password');
    Route::get('manual-booking',[CustomerController::class,'manualBooking'])->name('manual-booking');
    Route::post('save-manual-booking',[CustomerController::class,'saveManualBooking'])->name('save-manual-booking');
    Route::get('delete-manual-booking/{id}',[CustomerController::class,'delManualBooking'])->name('delete-manual-booking');
    Route::post('/update-password',[CustomerController::class,'updatePassword'])->name('update-password');
    Route::get('/exit',[CustomerController::class,'exit'])->name('exit');
    Route::get('/change-customer-status',[CustomerController::class,'changeCustomerStatus'])->name('change-customer-status');

    //Forgot Password Routes(Admin)
    
    Route::post('admin-render-send-email-form',[ResetPasswordController::class,'adminRenderSendEmailForm']);
    Route::post('admin-render-login-form',[ResetPasswordController::class,'adminRenderLoginForm']);
    Route::post('admin-send-verification-mail',[ResetPasswordController::class,'adminSendVerificationMail']);
    Route::post('admin-render-verification-form',[ResetPasswordController::class,'adminRenderVerificationForm']);
    Route::post('admin-verify-email',[ResetPasswordController::class,'adminVerifyEmail']);
    Route::post('admin-render-reset-password-form',[ResetPasswordController::class,'adminRenderResetPasswordForm']);
    Route::post('admin-reset-password',[ResetPasswordController::class,'adminResetPassword']);

    //Forgot Password Routes(Customer)
    Route::post('render-send-email-form',[ResetPasswordController::class,'renderSendEmailForm']);
    Route::post('render-login-form',[ResetPasswordController::class,'renderLoginForm']);
    Route::post('send-verification-mail',[ResetPasswordController::class,'sendVerificationMail']);
    Route::post('render-verification-form',[ResetPasswordController::class,'renderVerificationForm']);
    Route::post('verify-email',[ResetPasswordController::class,'verifyEmail']);
    Route::post('render-reset-password-form',[ResetPasswordController::class,'renderResetPasswordForm']);
    Route::post('reset-password',[ResetPasswordController::class,'resetPassword']); 

    Route::post('/place-order',[OrderController::class,'placeOrder'])->name('place-order');
    Route::post('/event-place-order',[OrderController::class,'event_placeOrder'])->name('event-place-order');
    Route::get('/login',[CustomerController::class,'login'])->name('login');
    Route::get('/registration',[CustomerController::class,'signup'])->name('signup');
    Route::post('/registration',[CustomerController::class,'registration'])->name('registration');


    Route::any('/orders',[OrderController::class,'orders'])->name('orders');
    Route::any('/event-order',[OrderController::class,'eventorder'])->name('event-order');
    Route::get('/order-details',[OrderController::class,'orderDetails'])->name('order-details');
    Route::get('/event-order-details',[OrderController::class,'eventorderDetails'])->name('event-order-details');
    Route::post('/update-order-status',[OrderController::class,'updateOrderStatus'])->name('update-order-status');
    Route::get('/generate-invoice',[OrderController::class,'generateInvoice'])->name('generate-invoice');
    Route::any('/manualbooking',[OrderController::class,'manual_booking'])->name('manualbooking');
    Route::any('/refundorder',[OrderController::class,'refund_orders'])->name('refundorder');
    Route::any('event-refundorder',[OrderController::class,'event_refund_orders'])->name('event-refundorder');
    Route::get('accept-refund/{id}',[OrderController::class,'accept_refund'])->name('accept-refund');
    Route::get('reject-refund/{id}',[OrderController::class,'reject_refund'])->name('reject-refund');
    Route::get('payment-refund/{id}',[OrderController::class,'payment_refund'])->name('payment-refund');

    Route::get('event-accept-refund/{id}',[OrderController::class,'event_accept_refund'])->name('event-accept-refund');
    Route::get('event-reject-refund/{id}',[OrderController::class,'event_reject_refund'])->name('event-reject-refund');
    Route::get('event-payment-refund/{id}',[OrderController::class,'event_payment_refund'])->name('event-payment-refund');
    //Appearance Routes
  /*  Route::get('/menu',[AppearanceController::class,'menu'])->name('menu');

    
    Route::post('/place-order',[OrderController::class,'placeOrder'])->name('place-order');
    Route::get('/orders',[OrderController::class,'orders'])->name('orders');
    Route::get('/order-details',[OrderController::class,'orderDetails'])->name('order-details');
    Route::post('/update-order-status',[OrderController::class,'updateOrderStatus'])->name('update-order-status');
    Route::get('/generate-invoice',[OrderController::class,'generateInvoice'])->name('generate-invoice');

    //Coupon Routes
    Route::get('/coupons',[CouponController::class,'coupons'])->name('coupons');
    Route::post('/add-coupon',[CouponController::class,'addCoupon'])->name('add-coupon');
    Route::get('/edit-coupon',[CouponController::class,'editCoupon'])->name('edit-coupon');
    Route::post('/update-coupon',[CouponController::class,'updateCoupon'])->name('update-coupon');
    Route::get('/delete-coupon',[CouponController::class,'deleteCoupon'])->name('delete-coupon');
    Route::post('/apply-coupon',[CouponController::class,'applyCoupon'])->name('apply-coupon');

    //Shipping Routes
    Route::get('/shippings',[ShippingController::class,'shippings'])->name('shippings');
    Route::get('defult-shippings',[ShippingController::class,'defult_shippings'])->name('defult-shippings');
    Route::post('update-defult-shipping',[ShippingController::class,'update_defult_shipping'])->name('update-defult-shipping');
    Route::post('/change-shipping-policy',[ShippingController::class,'changeShippingPolicy'])->name('change-shipping-policy');
    Route::post('/update-shipping-policy',[ShippingController::class,'updateShippingPolicy'])->name('update-shipping-policy');
    Route::get('/change-shipping-status',[ShippingController::class,'changeShippingStatus'])->name('change-shipping-status');
    Route::post('/change-shipping-charge',[ShippingController::class,'changeShippingCharge'])->name('change-shipping-charge');
    Route::post('/calculate-shipping-charge',[ShippingController::class,'calculateShippingCharge'])->name('calculate-shipping-charge');

    //Blog Routes
    Route::get('/all-blogs',[BlogController::class,'allBlogs'])->name('all-blogs');
    Route::get('/add-blog',[BlogController::class,'addBlog'])->name('add-blog');
    Route::post('/store-blog',[BlogController::class,'storeBlog'])->name('store-blog');
    Route::get('/blog-details',[BlogController::class,'blogDetails'])->name('blog-details');
    Route::get('/change-blog-status',[BlogController::class,'changeBlogStatus'])->name('change-blog-status');
    Route::get('/delete-blog',[BlogController::class,'deleteBlog'])->name('delete-blog');
    Route::get('/edit-blog',[BlogController::class,'editBlog'])->name('edit-blog');
    Route::post('/update-blog',[BlogController::class,'updateBlog'])->name('update-blog');

    //Payment Routes
    Route::get('/pay',[OrderController::class,'pay'])->name('pay');
    Route::post('/process-payment',[OrderController::class,'processPayment'])->name('process-payment');
    
    //Testing Routes
    Route::get('/test-mail',[FrontController::class,'testMail'])->name('test-mail');*/

    //Slug Route
    Route::get('/register-slug',[SlugController::class,'registerSlug'])->name('register-slug');
    Route::get('/{slug}',[SlugController::class,'slug']); 

});
