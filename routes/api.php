<?php

use App\Http\Controllers\Trainer\Api\AssessmentController;
use App\Http\Controllers\Api\ForgetPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Trainer\Api\AttendanceController;
use App\Http\Controllers\Trainer\Api\ClassController;
use App\Http\Controllers\Trainer\Api\StudentGradingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Auth::routes();

Route::post('loign_trainer', [LoginController::class, 'trainerlogin']);
Route::post('send_password_reset_code', [ForgetPasswordController::class, 'sendPasswordResetCode']);
Route::post('validate_reset_code', [ForgetPasswordController::class, 'validateResetCode']);
Route::post('update_password', [ForgetPasswordController::class, 'updatePassword']);
Route::post('update_profile', [ForgetPasswordController::class, 'updateProfile']);
//  attandance 
Route::post('get_swimming_sessions', [AttendanceController::class, 'getSwimmingSessions']);
Route::post('get_session_by_date', [AttendanceController::class, 'getSessionByDate']);
Route::post('get_student_profile', [AttendanceController::class, 'getStudentProfile']);
Route::post('session_student_lists', [AttendanceController::class, 'sessionStudentLists']);
Route::post('mark_attandance', [AttendanceController::class, 'markAttandance']);
Route::post('update_attandance', [AttendanceController::class, 'updateAttandance']);

// end attandance 

// student grading
Route::post('get_grading_sessions', [StudentGradingController::class, 'getGradingSessions']);
Route::post('grading_student_lists', [StudentGradingController::class, 'gradingStudentLists']);
Route::post('mark_grading', [StudentGradingController::class, 'markGrading']);
Route::post('update_student_grading', [StudentGradingController::class, 'updateStudentGrading']);

// end student grading
// student grading
Route::post('get_assessment_list', [AssessmentController::class, 'getAssessmentList']);
Route::post('get_assessment_sessions', [AssessmentController::class, 'getAssessmentSessions']);
Route::post('assessment_student_lists', [AssessmentController::class, 'assessmentStudentLists']);
Route::post('mark_assessment', [AssessmentController::class, 'markAssessment']);
Route::post('update_assessment', [AssessmentController::class, 'updateAssessment']);

Route::post('get_swimming_classes', [ClassController::class, 'getClasses']);
Route::post('promote_student', [AssessmentController::class, 'promoteStudent']);
// end student grading
// VqjQjX0ioI
