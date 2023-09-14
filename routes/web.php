<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\SaleController;
use App\Http\Controllers\Admin\TermController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\ClassController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\VenueController;
use App\Http\Controllers\Parent\CartController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\TimingController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TrainerController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Parent\StudentController;
use App\Http\Controllers\Admin\AssetTypeController;
use App\Http\Controllers\Admin\ClassTypeController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InventoryController;
use App\Http\Controllers\Admin\PromoCodeController;
use App\Http\Controllers\Parent\CheckoutController;
use App\Http\Controllers\Admin\CheckoutController as AdminCheckoutController;
use App\Http\Controllers\Parent\MyBookingController;
use App\Http\Controllers\Admin\DesignationController;
use App\Http\Controllers\Admin\InvoiceCycleController;
use App\Http\Controllers\Admin\SubscriptionController;
use App\Http\Controllers\Trainer\AssessmentController;
use App\Http\Controllers\Trainer\AttendanceController;
use App\Http\Controllers\Admin\ClassScheduleController;
use App\Http\Controllers\Admin\BlackoutPeriodController;
use App\Http\Controllers\Admin\FreeAssessmentController;
use App\Http\Controllers\Admin\RoleBaseAccessController;
use App\Http\Controllers\Admin\StudentBookingController;
use App\Http\Controllers\Parent\ManageBookingController;
use App\Http\Controllers\Trainer\NewsBullitenController;
use App\Http\Controllers\Admin\StaffManagementController;
use App\Http\Controllers\Admin\TermBaseBookingController;
use App\Http\Controllers\Parent\TrainerCommentController;
use App\Http\Controllers\Trainer\ScheduleClassController;
use App\Http\Controllers\Trainer\AccountSettingController;
use App\Http\Controllers\Trainer\PasswordChangeController;
use App\Http\Controllers\Trainer\StudentGradingController;
use App\Http\Controllers\Admin\AssessmentRequestController;
use App\Http\Controllers\Admin\CancelationPolicyController;
use App\Http\Controllers\Admin\ClassPromotRequestController;
use App\Http\Controllers\Admin\EmployeeSchedulingController;
use App\Http\Controllers\Admin\CustomerInformationController;
use App\Http\Controllers\Admin\ModerateTermBaseBookingController;
use App\Http\Controllers\Admin\CartController as AdminCartController;
use App\Http\Controllers\Admin\StudentController as AdminStudentController;
use App\Http\Controllers\Admin\AssessmentController as AdminAssessmentController;
use App\Http\Controllers\Parent\DashboardController as ParentDashboardController;
use App\Http\Controllers\Trainer\DashboardController as TrainerDashboardController;
use App\Http\Controllers\Trainer\ManageBookingController as TrainerManageBookingController;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('venues', function () {
    return view('pages.venue');
});
Route::get('about-us', function () {
    return view('pages.about_us');
});
Route::get('contact-us', function () {
    return view('pages.contact_us');
});
Route::get('venue-timetable', function () {
    return view('pages.venue_table');
});
Route::get('compitition', function () {
    return view('pages.compitition');
});
Route::get('qualified', function () {
    return view('pages.qualified');
});
Route::get('feedback_queries', function () {
    return view('pages.feedback');
});
Route::get('view_area', [HomeController::class, 'ViewArea']);
Route::post('add_emirate', [HomeController::class, 'addEmirate']);
Route::get('emirate_delete/{id}', [HomeController::class, 'emirateDelete']);
Route::post('add_area', [HomeController::class, 'addArea']);
Route::get('area_delete/{id}', [HomeController::class, 'areaDelete']);
Auth::routes();
Route::get('admin/login', [DashboardController::class, 'login']);
Route::post('admin/login', [LoginController::class, 'adminlogin']);
Route::post('trainer/login', [LoginController::class, 'trainerlogin']);

Route::get('login/google', [HomeController::class, 'googleLogin']);
Route::get('auth/google/callback', [HomeController::class, 'googleCallbackUrl']);

Route::get('login/facebook', [HomeController::class, 'facebookLogin']);
Route::get('auth/facebook/callback', [HomeController::class, 'facebookCallbackUrl']);

Route::middleware('super_admin')->prefix('admin')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index']);
    // event schedules
    Route::get('schedules', [ScheduleController::class, 'index']);
    Route::get('schedules/create', [ScheduleController::class, 'create']);
    Route::post('schedules', [ScheduleController::class, 'store']);
    Route::get('schedules/{id}/edit', [ScheduleController::class, 'edit']);
    Route::post('schedules/{id}', [ScheduleController::class, 'update']);
    Route::delete('schedules/{id}', [ScheduleController::class, 'destroy']);
    Route::post('class-subscription/{id}', [ScheduleController::class, 'classSubscription']);
    // end schedules urls
    //  settings urls
    Route::get('settings', [SettingController::class, 'index']);
    Route::post('settings/{id}', [SettingController::class, 'update']);
    Route::get('setting-emails', [SettingController::class, 'settingEmail']);
    Route::get('setting-security', [SettingController::class, 'settingSecurity']);
    Route::get('setting-accounts', [SettingController::class, 'settingAccount']);
    // end settings urls

    // event inventories
    Route::get('inventories', [InventoryController::class, 'index']);
    Route::get('inventories/create', [InventoryController::class, 'create']);
    Route::post('inventories', [InventoryController::class, 'store']);
    Route::get('inventories/{id}/edit', [InventoryController::class, 'edit']);
    Route::post('inventories/{id}', [InventoryController::class, 'update']);
    Route::delete('inventories/{id}', [InventoryController::class, 'destroy']);
    // end inventories urls
    // assets type urls
    Route::get('class-types', [ClassTypeController::class, 'index']);
    Route::get('class-types/create', [ClassTypeController::class, 'create']);
    Route::post('class-types', [ClassTypeController::class, 'store']);
    Route::get('class-types/{id}/edit', [ClassTypeController::class, 'edit']);
    Route::post('class-types/{id}', [ClassTypeController::class, 'update']);
    Route::delete('class-types/{id}', [ClassTypeController::class, 'destroy']);
    // end assets type urls
    // class urls
    Route::get('classes', [ClassController::class, 'index']);
    Route::post('classes', [ClassController::class, 'store']);
    Route::get('classes/{id}/edit', [ClassController::class, 'edit']);
    Route::post('classes/{id}', [ClassController::class, 'update']);
    Route::delete('classes/{id}', [ClassController::class, 'destroy']);
    // end class urls
    // venue urls
    Route::get('venues', [VenueController::class, 'index']);
    Route::get('venue_calendar', [VenueController::class, 'VenueCalendar']);
    Route::get('venues/create', [VenueController::class, 'create']);
    Route::post('venues', [VenueController::class, 'store']);
    Route::get('venues/{id}/edit', [VenueController::class, 'edit']);
    Route::post('venues/{id}', [VenueController::class, 'update']);
    Route::delete('venues/{id}', [VenueController::class, 'destroy']);
    // end venue urls
    // event urls
    Route::get('events', [EventController::class, 'index']);
    Route::get('events/create', [EventController::class, 'create']);
    Route::post('events', [EventController::class, 'store']);
    Route::get('events/{id}/edit', [EventController::class, 'edit']);
    Route::post('events/{id}', [EventController::class, 'update']);
    Route::delete('events/{id}', [EventController::class, 'destroy']);
    // end event urls

    // assets type urls
    Route::get('asset-types', [AssetTypeController::class, 'index']);
    Route::get('asset-types/create', [AssetTypeController::class, 'create']);
    Route::post('asset-types', [AssetTypeController::class, 'store']);
    Route::get('asset-types/{id}/edit', [AssetTypeController::class, 'edit']);
    Route::post('asset-types/{id}', [AssetTypeController::class, 'update']);
    Route::delete('asset-types/{id}', [AssetTypeController::class, 'destroy']);
    // end assets type urls

    // products urls
    Route::get('products', [ProductController::class, 'index']);
    Route::get('products/create', [ProductController::class, 'create']);
    Route::post('products', [ProductController::class, 'store']);
    Route::get('products/{id}/edit', [ProductController::class, 'edit']);
    Route::post('products/{id}', [ProductController::class, 'update']);
    Route::delete('products/{id}', [ProductController::class, 'destroy']);
    // end products urls
    Route::resource('invoice-cycles', InvoiceCycleController::class);
    Route::resource('sales', SaleController::class);
    // subscriptions urls
    Route::get('moderate-term-base-bookings', [ModerateTermBaseBookingController::class, 'index']);
    Route::post('term_base_booking_approved/{id}', [ModerateTermBaseBookingController::class, 'termBaseBookingApproved']);
    Route::get('term-base-bookings', [TermBaseBookingController::class, 'index']);
    Route::get('term-base-bookings/create', [TermBaseBookingController::class, 'create']);
    Route::post('term-base-bookings', [TermBaseBookingController::class, 'store']);
    Route::post('copy-term-base-bookings/{id}', [TermBaseBookingController::class, 'copyTerm']);
    Route::get('term-base-bookings/{id}/edit', [TermBaseBookingController::class, 'edit']);
    Route::get('term-base-bookings/{id}/copy', [TermBaseBookingController::class, 'copy']);
    Route::post('term-base-bookings/{id}', [TermBaseBookingController::class, 'update']);
    Route::delete('term-base-bookings/{id}', [TermBaseBookingController::class, 'destroy']);
    Route::post('select_term', [TermBaseBookingController::class, 'selectTerm']);
    // end subscriptions urls
    // start terms urls
    Route::get('terms', [TermController::class, 'index']);
    Route::get('terms/create', [TermController::class, 'create']);
    Route::post('terms', [TermController::class, 'store']);
    Route::get('terms/{id}/edit', [TermController::class, 'edit']);
    Route::post('terms/{id}', [TermController::class, 'update']);
    Route::delete('terms/{id}', [TermController::class, 'destroy']);
    // end terms urls
    // subscriptions urls
    Route::get('subscriptions', [SubscriptionController::class, 'index']);
    Route::get('subscriptions/create', [SubscriptionController::class, 'create']);
    Route::post('subscriptions', [SubscriptionController::class, 'store']);
    Route::get('subscriptions/{id}/edit', [SubscriptionController::class, 'edit']);
    Route::post('subscriptions/{id}', [SubscriptionController::class, 'update']);
    Route::delete('subscriptions/{id}', [SubscriptionController::class, 'destroy']);
    // end subscriptions urls
    //  timing urls
    Route::get('timings', [TimingController::class, 'index']);
    Route::get('timings/create', [TimingController::class, 'create']);
    Route::post('timings', [TimingController::class, 'store']);
    Route::get('timings/{id}/edit', [TimingController::class, 'edit']);
    Route::post('timings/{id}', [TimingController::class, 'update']);
    Route::delete('timings/{id}', [TimingController::class, 'destroy']);
    // end  timing urls
    //  bookings urls
    Route::get('bookings', [BookingController::class, 'index']);
    Route::get('bookings/create', [BookingController::class, 'create']);
    Route::post('bookings', [BookingController::class, 'store']);
    Route::get('bookings/{id}/edit', [BookingController::class, 'edit']);
    Route::post('bookings/{id}', [BookingController::class, 'update']);
    Route::delete('bookings/{id}', [BookingController::class, 'destroy']);
    Route::post('check-slots/{id}', [BookingController::class, 'checkSlots']);
    Route::post('get_timings/{id}', [BookingController::class, 'getTiming']);
    // end  bookings urls
    Route::resource('reports', ReportController::class);

    // venue urls
    Route::get('designations', [DesignationController::class, 'index']);
    Route::get('designations/create', [DesignationController::class, 'create']);
    Route::post('designations', [DesignationController::class, 'store']);
    Route::get('designations/{id}/edit', [DesignationController::class, 'edit']);
    Route::post('designations/{id}', [DesignationController::class, 'update']);
    Route::delete('designations/{id}', [DesignationController::class, 'destroy']);
    // end venue urls
    // staff-managements urls
    Route::get('staff-managements', [StaffManagementController::class, 'index']);
    Route::get('staff-managements/create', [StaffManagementController::class, 'create']);
    Route::post('staff-managements', [StaffManagementController::class, 'store']);
    Route::get('staff-managements/{id}/edit', [StaffManagementController::class, 'edit']);
    Route::post('staff-managements/{id}', [StaffManagementController::class, 'update']);
    Route::delete('staff-managements/{id}', [StaffManagementController::class, 'destroy']);
    // end staff-managements urls
    // trainers urls
    Route::get('trainers', [TrainerController::class, 'index']);
    Route::get('trainers/create', [TrainerController::class, 'create']);
    Route::post('trainers', [TrainerController::class, 'store']);
    Route::get('trainers/{id}/edit', [TrainerController::class, 'edit']);
    Route::post('trainers/{id}', [TrainerController::class, 'update']);
    Route::delete('trainers/{id}', [TrainerController::class, 'destroy']);
    // end trainers urls
    // event role-base-accesses
    Route::get('role-base-accesses', [RoleBaseAccessController::class, 'index']);
    Route::get('role-base-accesses/create', [RoleBaseAccessController::class, 'create']);
    Route::post('role-base-accesses', [RoleBaseAccessController::class, 'store']);
    Route::get('role-base-accesses/{id}/edit', [RoleBaseAccessController::class, 'edit']);
    Route::post('role-base-accesses/{id}', [RoleBaseAccessController::class, 'update']);
    Route::delete('role-base-accesses/{id}', [RoleBaseAccessController::class, 'destroy']);
    // end role-base-accesses urls
    //  timing urls
    Route::get('employee-schedulings', [EmployeeSchedulingController::class, 'index']);
    Route::get('employee-schedulings/create', [EmployeeSchedulingController::class, 'create']);
    Route::post('employee-schedulings', [EmployeeSchedulingController::class, 'store']);
    Route::get('employee-schedulings/{id}', [EmployeeSchedulingController::class, 'show']);
    Route::get('employee-schedulings/{id}/edit', [EmployeeSchedulingController::class, 'edit']);
    Route::post('employee-schedulings/{id}', [EmployeeSchedulingController::class, 'update']);
    Route::delete('employee-schedulings/{id}', [EmployeeSchedulingController::class, 'destroy']);
    Route::get('employee_schecdule_calendar', [EmployeeSchedulingController::class, 'employeeSchecduleCalendar']);
    // end  timing urls
    // customer-informations
    Route::get('customer-informations', [CustomerInformationController::class, 'index']);
    Route::get('customer-informations/create', [CustomerInformationController::class, 'create']);
    Route::post('customer-informations/store', [CustomerInformationController::class, 'store']);
    Route::get('customer-informations/{id}', [CustomerInformationController::class, 'show']);
    Route::get('customer-informations/{id}/edit', [CustomerInformationController::class, 'edit']);
    Route::post('customer-informations/{id}', [CustomerInformationController::class, 'update']);
    Route::delete('customer-informations/{id}', [CustomerInformationController::class, 'destroy']);

    Route::get('customer-informations/{id}/student/add', [CustomerInformationController::class, 'getStudent']);
    Route::post('customer-informations/student/store', [CustomerInformationController::class, 'addStudent']);

    Route::post('get_area', [ParentDashboardController::class, 'getArea']);


    // Add to Cart 
    Route::post('add-to-cart-term/{id}', [AdminCartController::class, 'addToCartTerm']);
    Route::post('add-to-cart-package/{id}', [AdminCartController::class, 'addToCartPackage']);
    Route::post('add-to-cart-product/{id}', [AdminCartController::class, 'addToCartProduct']);

    // update cart
    Route::post('change-qty', [AdminCartController::class, 'updateQty']);
    Route::post('cart/{id}', [AdminCartController::class, 'destroy']);
    Route::post('{parent_id}/empty-cart', [AdminCartController::class, 'emptyCart']);

    // Admin student booking
    Route::get('customer-informations/{parent_id}/student-booking', [StudentBookingController::class, 'index']);
    Route::post('filter-terms', [StudentBookingController::class, 'filterTerm']);
    //checkout
    Route::get('customer-informations/{user}/checkout', [AdminCheckoutController::class, 'index']);
    Route::post('customer-informations/{user}/checkout', [AdminCheckoutController::class, 'store']);
    Route::post('promo-code', [AdminCheckoutController::class, 'promoCode']);
    Route::get('thank-you', [AdminCheckoutController::class, 'thankYou']);


    // end customer-informations urls
    // promo-codes urls
    Route::get('promo-codes', [PromoCodeController::class, 'index']);
    Route::get('promo-codes/create', [PromoCodeController::class, 'create']);
    Route::post('promo-codes', [PromoCodeController::class, 'store']);
    Route::get('promo-codes/{id}/edit', [PromoCodeController::class, 'edit']);
    Route::post('promo-codes/{id}', [PromoCodeController::class, 'update']);
    Route::delete('promo-codes/{id}', [PromoCodeController::class, 'destroy']);
    // end promo-codes urls

    // free-assessments urls
    Route::get('assessment-requests', [AssessmentRequestController::class, 'index']);
    Route::get('assessment-requests/create', [AssessmentRequestController::class, 'create']);
    Route::get('assessment-requests/{id}/edit', [AssessmentRequestController::class, 'edit']);
    Route::post('assessment-requests/{id}', [AssessmentRequestController::class, 'update']);
    Route::delete('assessment-requests/{id}', [AssessmentRequestController::class, 'destroy']);
    Route::post('change_status', [AssessmentRequestController::class, 'changeStatus']);
    // end free-assessments urls

    // class-promot urls
    Route::get('class-promot-requests', [ClassPromotRequestController::class, 'index']);
    Route::post('accept_request/{id}', [ClassPromotRequestController::class, 'acceptRequest']);
    // end class-promot urls

    // assessments urls
    Route::get('assessments', [AdminAssessmentController::class, 'index']);
    Route::get('assessments/create', [AdminAssessmentController::class, 'create']);
    Route::post('assessments', [AdminAssessmentController::class, 'store']);
    Route::get('assessments/{id}/edit', [AdminAssessmentController::class, 'edit']);
    Route::post('assessments/{id}', [AdminAssessmentController::class, 'update']);
    Route::delete('assessments/{id}', [AdminAssessmentController::class, 'destroy']);
    // end assessments urls

    // students urls
    Route::get('students', [AdminStudentController::class, 'index']);
    Route::get('students/{id}', [AdminStudentController::class, 'show']);
    Route::get('students/{id}/edit', [AdminStudentController::class, 'edit']);
    Route::post('students/{id}', [AdminStudentController::class, 'update']);
    Route::post('change_assessment_status/{id}', [AdminStudentController::class, 'changeAssessmentStatus']);
    Route::post('add_student_credit/{id}', [AdminStudentController::class, 'addStudentCredit']);



    // end students urls
    // class-schedules urls
    Route::get('class-schedules', [ClassScheduleController::class, 'index']);
    Route::get('class-schedules/{id}', [ClassScheduleController::class, 'show']);
    // end class-schedules urls

    // cancelation-policies urls
    Route::get('cancelation-policies', [CancelationPolicyController::class, 'index']);
    Route::get('cancelation-policies/create', [CancelationPolicyController::class, 'create']);
    Route::post('cancelation-policies', [CancelationPolicyController::class, 'store']);
    Route::get('cancelation-policies/{id}/edit', [CancelationPolicyController::class, 'edit']);
    Route::post('cancelation-policies/{id}', [CancelationPolicyController::class, 'update']);
    Route::delete('cancelation-policies/{id}', [CancelationPolicyController::class, 'destroy']);
    // end cancelation-policies urls
    // blackout-periods urls
    Route::get('blackout-periods', [BlackoutPeriodController::class, 'index']);
    Route::get('blackout-periods/create', [BlackoutPeriodController::class, 'create']);
    Route::post('blackout-periods', [BlackoutPeriodController::class, 'store']);
    Route::get('blackout-periods/{id}/edit', [BlackoutPeriodController::class, 'edit']);
    Route::post('blackout-periods/{id}', [BlackoutPeriodController::class, 'update']);
    Route::delete('blackout-periods/{id}', [BlackoutPeriodController::class, 'destroy']);
    // end blackout-periods urls
    Route::resource('contact-us', ContactUsController::class);
});
Route::post('send_password_reset_code', [PasswordChangeController::class, 'sendPasswordResetCode']);
Route::get('verify_code_view', [PasswordChangeController::class, 'verifyCodeView']);
Route::post('validate_reset_code', [PasswordChangeController::class, 'validateResetCode']);
Route::get('password', [PasswordChangeController::class, 'password']);
Route::post('update_password', [PasswordChangeController::class, 'updatePassword']);
Route::get('trainer/login', [TrainerDashboardController::class, 'login']);
Route::middleware('is_trainer')->prefix('trainer')->group(function () {
    Route::get('dashboard', [TrainerDashboardController::class, 'index']);
    Route::get('profile', [TrainerDashboardController::class, 'profile']);
    Route::resource('manage-bookings', TrainerManageBookingController::class);
    Route::resource('schedule-classes', ScheduleClassController::class);
    // blackout-periods urls
    Route::get('attendances', [AttendanceController::class, 'index']);
    Route::get('attendances/{id}', [AttendanceController::class, 'show']);
    Route::post('session-attandance/{id}', [AttendanceController::class, 'sessionAttendance']);
    Route::post('change_attendance/{id}', [AttendanceController::class, 'changeAttendance']);
    Route::post('get_session_by_date', [TrainerManageBookingController::class, 'getSessionByDate']);
    // end blackout-periods urls
    // student-gradings urls
    Route::get('student-gradings', [StudentGradingController::class, 'index']);
    Route::get('student-gradings/{id}', [StudentGradingController::class, 'show']);
    Route::post('student-gradings/{id}', [StudentGradingController::class, 'store']);
    Route::post('update-gradings/{id}', [StudentGradingController::class, 'update']);
    // end student-gradings urls

    // assessments urls
    Route::get('assessments', [AssessmentController::class, 'index']);
    Route::get('assessments/{id}', [AssessmentController::class, 'show']);
    Route::post('assessments/{id}', [AssessmentController::class, 'store']);
    Route::post('update-assessments/{id}', [AssessmentController::class, 'update']);
    Route::post('promot_class/{id}', [AssessmentController::class, 'promotClass']);
    // end assessments urls

    // Route::resource('assessments', AssessmentController::class);
    Route::resource('news-bullitens', NewsBullitenController::class);
    Route::resource('account-settings', AccountSettingController::class);
    Route::post('profile-update/{id}', [AccountSettingController::class, 'profileUpdate']);
    Route::post('change-password/{id}', [AccountSettingController::class, 'changePassword']);
    Route::post('save-activity-log/{id}', [AccountSettingController::class, 'saveActivityLog']);
});
Route::middleware('parent')->prefix('parent')->group(function () {
    Route::get('dashboard', [ParentDashboardController::class, 'index']);
    Route::get('profile', [ParentDashboardController::class, 'profile']);
    Route::post('get_area', [ParentDashboardController::class, 'getArea']);
    Route::post('profile-update/{id}', [ParentDashboardController::class, 'profileUpdate']);
    Route::post('change-password/{id}', [ParentDashboardController::class, 'changePassword']);
    Route::post('save-activity-log/{id}', [ParentDashboardController::class, 'saveActivityLog']);
    //payment info add
    Route::get('payment', [ParentDashboardController::class, 'payment']);
    Route::get('security', [ParentDashboardController::class, 'security']);
    Route::post('add-payment/{id}', [ParentDashboardController::class, 'addPayment']);
    // students urls
    Route::get('students', [StudentController::class, 'index']);
    Route::get('student-detail/{id}', [StudentController::class, 'studentDetail']);
    Route::get('students/create', [StudentController::class, 'create']);
    Route::post('students', [StudentController::class, 'store']);
    Route::get('students/{id}/edit', [StudentController::class, 'edit']);
    Route::post('students/{id}', [StudentController::class, 'update']);
    Route::delete('students/{id}', [StudentController::class, 'destroy']);
    // end trainers urls
    // assessment-requests
    Route::post('assessment-requests/{id}', [AssessmentRequestController::class, 'store']);
    // assessment-requests
    //manage bookings
    Route::get('manage-bookings', [ManageBookingController::class, 'index']);
    Route::post('filter-terms', [ManageBookingController::class, 'filterTerm']);
    Route::get('shops', [ManageBookingController::class, 'shops']);
    Route::get('shops/{id}', [ManageBookingController::class, 'productDetail']);
    Route::get('my-privilege', [ManageBookingController::class, 'myPrivilege']);
    Route::post('search-product', [ManageBookingController::class, 'searchProduct']);
    // add to cart 
    Route::post('add-to-cart-term/{id}', [CartController::class, 'addToCartTerm']);
    Route::post('add-to-cart-package/{id}', [CartController::class, 'addToCartPackage']);
    Route::post('add-to-cart-product/{id}', [CartController::class, 'addToCartProduct']);
    // update cart
    Route::post('change-qty', [CartController::class, 'updateQty']);
    Route::post('cart/{id}', [CartController::class, 'destroy']);
    Route::post('empty-cart', [CartController::class, 'emptyCart']);
    //
    Route::resource('trainer-comments', TrainerCommentController::class);
    //checkout
    Route::get('checkouts', [CheckoutController::class, 'index']);
    Route::post('checkouts', [CheckoutController::class, 'store']);
    Route::post('promo-code', [CheckoutController::class, 'promoCode']);
    Route::get('thank-you', [CheckoutController::class, 'thankYou']);
    // my booking
    Route::get('my-bookings', [MyBookingController::class, 'index']);
    Route::get('my-bookings/{id}', [MyBookingController::class, 'show']);
    Route::get('order_details/{id}', [MyBookingController::class, 'orderDetail']);
    Route::get('invoice/{id}', [MyBookingController::class, 'invoice']);
    Route::post('my-bookings/{id}', [MyBookingController::class, 'update']);
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('clear-cache', function () {
    Artisan::call('optimize:clear');
    return back();
});

Route::get('migrate-fresh', function () {
    Artisan::call('migrate:fresh');
    dd("Migration Freshed");
});
Route::get('migrate', function () {
    Artisan::call('migrate');
    dd("Migration Completed");
});

Route::get('seed', function () {
    Artisan::call('db:seed');
    dd("Seeding Completed");
});

Route::get('storage-link', function () {
    Artisan::call('storage:link');
    dd("links Completed");
});
Route::get('passport-install', function () {
    Artisan::call('passport-install');
    dd("links Completed");
});
