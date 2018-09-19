<?php

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


Route::get('/', 'Frontend\PagesController@index')->name('index');
Route::get('/department/{short_name}', 'Frontend\DepartmentController@index')->name('department.index');
Route::get('/teacher/{username}', 'Frontend\TeacherController@show')->name('teacher.index');
Route::get('/staff/{username}', 'Frontend\StaffController@index')->name('staff.index');
Route::get('/administration', 'Frontend\PagesController@administration')->name('administration');
Route::get('/about/overview', 'Frontend\AboutController@overview')->name('about.overview');
Route::get('/about/vision', 'Frontend\AboutController@vision')->name('about.vision');
Route::get('/download/form', 'Frontend\DownloadController@form')->name('download.form');
Route::get('/download/result', 'Frontend\DownloadController@result')->name('download.result');
Route::get('/gallery', 'Frontend\PagesController@gallery')->name('gallery');

// Academic Routes
Route::group(['prefix' => 'academic'], function(){
    Route::get('/bsc', 'Frontend\AcademicController@bsc')->name('academic.bsc');
    Route::get('/msc', 'Frontend\AcademicController@msc')->name('academic.msc');
    Route::get('/activities', 'Frontend\AcademicController@activities')->name('academic.activities');
    Route::get('/scholarship', 'Frontend\AcademicController@scholarship')->name('academic.scholarship');
});

// Notice Routes
Route::group(['prefix' => 'notice'], function(){
    Route::get('/', 'Frontend\NoticeController@index')->name('notice.index');
    Route::get('/{slug}', 'Frontend\NoticeController@single')->name('notice.single');
});
Route::get('/event/{slug}', 'Frontend\NoticeController@singleEvent')->name('event.single');
Route::get('/news/{slug}', 'Frontend\NoticeController@singleNews')->name('news.single');
Route::get('/all-notice', 'Frontend\NoticeController@notice')->name('allNotice');
Route::get('/news', 'Frontend\NoticeController@news')->name('allNews');
Route::get('/events', 'Frontend\NoticeController@event')->name('allEvent');



// Route::get('/teacher', 'Frontend\TeacherController@index')->name('teacher.dashboard');
// Route::get('/teacher/dashboard/login', 'Auth\Teacher\LoginController@showLoginForm')->name('teacher.login');
// Route::post('/teacher/dashboard/login', 'Auth\Teacher\LoginController@login')->name('teacher.login.submit');
// Route::post('/teacher/logout', 'Auth\Teacher\LoginController@logout')->name('teacher.dashboard.logout');
// //Password resets routes
// Route::post('/teacher/password/email', 'Auth\Teacher\ForgotPasswordController@sendResetLinkEmail')->name('teacher.password.email');
// Route::get('/teacher/password/reset', 'Auth\Teacher\ForgotPasswordController@showLinkRequestForm')->name('teacher.password.request');
// Route::post('/teacher/password/reset', 'Auth\Teacher\ResetPasswordController@reset');
// Route::get('/teacher/password/reset/{token}', 'Auth\Teacher\ResetPasswordController@showResetForm')->name('teacher.password.reset');
//
// Route::get('/teacher/dashboard/edit', 'Frontend\TeacherController@editProfileForm')->name('teacher.dashboard.edit');
// Route::post('/teacher/dashboard/edit', 'Frontend\TeacherController@editProfile')->name('teacher.dashboard.update');
// Route::get('/teacher/dashboard/material', 'Frontend\TeacherController@materials')->name('teacher.dashboard.material');
// Route::post('/teacher/dashboard/material/add', 'Frontend\TeacherController@addMaterial')->name('teacher.dashboard.material.add');
// Route::post('/teacher/dashboard/material/edit/{id}', 'Frontend\TeacherController@editMaterial')->name('teacher.dashboard.material.update');
// Route::post('/teacher/dashboard/material/delete', 'Frontend\TeacherController@deleteMaterial')->name('teacher.dashboard.material.delete');
// Route::get('/teacher/dashboard/change-password', 'Frontend\TeacherController@changePasswordForm')->name('teacher.changePasswordForm');
// Route::post('/teacher/dashboard/change-password', 'Frontend\TeacherController@changePassword')->name('teacher.changePassword');




/**
* Teachers Routes => All routes associate to teacher account
*/
Route::group(['prefix' => 'teacher'], function(){
  Route::get('/', 'Frontend\TeacherController@index')->name('teacher.dashboard');
  Route::get('/dashboard/login', 'Auth\Teacher\LoginController@showLoginForm')->name('teacher.login');
  Route::post('/dashboard/login', 'Auth\Teacher\LoginController@login')->name('teacher.login.submit');
  Route::post('/logout', 'Auth\Teacher\LoginController@logout')->name('teacher.dashboard.logout');
  //Password resets routes
  Route::post('/password/email', 'Auth\Teacher\ForgotPasswordController@sendResetLinkEmail')->name('teacher.password.email');
  Route::get('/password/reset', 'Auth\Teacher\ForgotPasswordController@showLinkRequestForm')->name('teacher.password.request');
  Route::post('/password/reset', 'Auth\Teacher\ResetPasswordController@reset');
  Route::get('/password/reset/{token}', 'Auth\Teacher\ResetPasswordController@showResetForm')->name('teacher.password.reset');

  Route::get('/dashboard/edit', 'Frontend\TeacherController@editProfileForm')->name('teacher.dashboard.edit');
  Route::post('/dashboard/edit', 'Frontend\TeacherController@editProfile')->name('teacher.dashboard.update');
  Route::get('/dashboard/material', 'Frontend\TeacherController@materials')->name('teacher.dashboard.material');
  Route::post('/dashboard/material/add', 'Frontend\TeacherController@addMaterial')->name('teacher.dashboard.material.add');
  Route::post('/dashboard/material/edit/{id}', 'Frontend\TeacherController@editMaterial')->name('teacher.dashboard.material.update');
  Route::post('/dashboard/material/delete', 'Frontend\TeacherController@deleteMaterial')->name('teacher.dashboard.material.delete');
  Route::get('/dashboard/change-password', 'Frontend\TeacherController@changePasswordForm')->name('teacher.changePasswordForm');
  Route::post('/dashboard/change-password', 'Frontend\TeacherController@changePassword')->name('teacher.changePassword');
});
/**
* End Teacher Routes
*/




/**
* Student Routes => All routes associate to student account
*/
// Route::group(['prefix' => 'student'], function(){
//
//     Route::get('/dashboard', 'Frontend\StudentController@index')->name('student.dashboard');
//
//     Route::get('/sign-up', 'Auth\Student\RegisterController@showRegistrationForm')->name('student.register');
//     Route::post('/sign-up', 'Auth\Student\RegisterController@register')->name('student.register_post');
//     Route::get('/verify/{verify_token}', 'Auth\Student\VerificationController@verify')->name('student.verify');
//     Route::get('/verify/student/{student_id}/{verify_token}', 'Auth\Student\VerificationController@verification_page')->name('student.verification');
//
//     Route::get('/login', 'Auth\Student\LoginController@showLoginForm')->name('student.login');
//     Route::post('/login', 'Auth\Student\LoginController@login')->name('student.login.submit');
//     Route::post('/logout', 'Auth\Student\LoginController@logout')->name('student.logout');
//
//     //Password resets routes
//     Route::post('/password/email', 'Auth\Student\ForgotPasswordController@sendResetLinkEmail')->name('student.password.email');
//     Route::get('/password/reset', 'Auth\Student\ForgotPasswordController@showLinkRequestForm')->name('student.password.request');
//     Route::post('/password/reset', 'Auth\Student\ResetPasswordController@reset');
//     Route::get('/password/reset/{token}', 'Auth\Student\ResetPasswordController@showResetForm')->name('student.password.reset');
// });






/**
* Admin Routes
*/
Route::group(['prefix' => 'admin'], function(){

    Route::get('/login', 'Auth\Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\Admin\LoginController@login')->name('admin.login.submit');
    Route::post('/logout', 'Auth\Admin\LoginController@logout')->name('admin.logout');

    //Password resets routes
    Route::post('/password/email', 'Auth\Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset', 'Auth\Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset', 'Auth\Admin\ResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'Auth\Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');

    Route::get('/', 'Backend\PagesController@index')->name('admin.dashboard');
    Route::get('/change-password', 'Backend\PagesController@changePasswordForm')->name('admin.changePassword');
    Route::post('/change-password', 'Backend\PagesController@changePassword')->name('admin.changePassword.submit');


    // About Routes
    Route::group(['prefix' => 'about'], function(){
        Route::get('/', 'Backend\AboutController@index')->name('admin.about.index');
        Route::get('/edit', 'Backend\AboutController@create')->name('admin.about.edit');
        Route::post('/edit', 'Backend\AboutController@store')->name('admin.about.store');
    });


    // Academic Routes
    Route::group(['prefix' => 'academic'], function(){
        Route::get('/', 'Backend\AcademicController@index')->name('admin.academic.index');
        Route::get('/edit', 'Backend\AcademicController@create')->name('admin.academic.edit');
        Route::post('/edit', 'Backend\AcademicController@store')->name('admin.academic.store');
    });


    // Department Routes
    Route::group(['prefix' => 'department'], function(){
        Route::get('/', 'Backend\DepartmentController@index')->name('admin.department.index');
        Route::get('/add', 'Backend\DepartmentController@create')->name('admin.department.create');
        Route::post('/add', 'Backend\DepartmentController@store')->name('admin.department.store');
        Route::get('/edit/{id}', 'Backend\DepartmentController@edit')->name('admin.department.edit');
        Route::post('/edit/{id}', 'Backend\DepartmentController@update')->name('admin.department.update');
        Route::post('/delete/{id}', 'Backend\DepartmentController@destroy')->name('admin.department.delete');
    });


    // Course Routes
    Route::group(['prefix' => 'course'], function(){
        Route::get('/', 'Backend\CourseController@index')->name('admin.course.index');
        Route::post('/add', 'Backend\CourseController@store')->name('admin.course.store');
        Route::post('/edit/{id}', 'Backend\CourseController@update')->name('admin.course.update');
        Route::post('/delete/{id}', 'Backend\CourseController@destroy')->name('admin.course.delete');
        Route::get('/{department_short_name}', 'Backend\CourseController@departmentCourse')->name('admin.course.department');
    });


    // Dean Merit List Routes
    Route::group(['prefix' => 'deanmeritlist'], function(){
        Route::get('/', 'Backend\DeanMeritListController@index')->name('admin.deanMeritList.index');
        Route::get('/add', 'Backend\DeanMeritListController@create')->name('admin.deanMeritList.create');
        Route::post('/add', 'Backend\DeanMeritListController@store')->name('admin.deanMeritList.store');
        Route::get('/edit/{id}', 'Backend\DeanMeritListController@edit')->name('admin.deanMeritList.edit');
        Route::post('/edit/{id}', 'Backend\DeanMeritListController@update')->name('admin.deanMeritList.update');
        Route::post('/delete/{id}', 'Backend\DeanMeritListController@destroy')->name('admin.deanMeritList.delete');
    });


    // Download File Routes
    Route::group(['prefix' => 'download'], function(){
        Route::get('/', 'Backend\DownloadController@index')->name('admin.download.index');
        Route::post('/add', 'Backend\DownloadController@store')->name('admin.download.store');
        Route::post('/edit/{id}', 'Backend\DownloadController@update')->name('admin.download.update');
        Route::post('/delete/{id}', 'Backend\DownloadController@destroy')->name('admin.download.delete');
    });


    // Gallery Routes
    Route::group(['prefix' => 'gallery'], function(){
        Route::get('/', 'Backend\GalleryController@index')->name('admin.gallery.index');
        Route::post('/add', 'Backend\GalleryController@store')->name('admin.gallery.store');
        Route::post('/edit/{id}', 'Backend\GalleryController@update')->name('admin.gallery.update');
        Route::post('/delete/{id}', 'Backend\GalleryController@destroy')->name('admin.gallery.delete');
    });


    // Notice Routes
    Route::group(['prefix' => 'notice'], function(){
        Route::get('/', 'Backend\NoticeController@index')->name('admin.notice.index');
        Route::get('/add', 'Backend\NoticeController@create')->name('admin.notice.create');
        Route::post('/add', 'Backend\NoticeController@store')->name('admin.notice.store');
        Route::get('/edit/{id}', 'Backend\NoticeController@edit')->name('admin.notice.edit');
        Route::post('/edit/{id}', 'Backend\NoticeController@update')->name('admin.notice.update');
        Route::post('/delete/{id}', 'Backend\NoticeController@destroy')->name('admin.notice.delete');
        Route::get('/publish/{id}', 'Backend\NoticeController@publish')->name('admin.notice.publish');
        Route::get('/unpublish/{id}', 'Backend\NoticeController@unpublish')->name('admin.notice.unpublish');
    });


    // Staff Routes
    Route::group(['prefix' => 'staff'], function(){
        Route::get('/', 'Backend\StaffController@index')->name('admin.staff.index');
        Route::post('/add', 'Backend\StaffController@store')->name('admin.staff.store');
        Route::post('/edit/{id}', 'Backend\StaffController@update')->name('admin.staff.update');
        Route::post('/delete/{id}', 'Backend\StaffController@destroy')->name('admin.staff.delete');
        Route::get('/office/{id}', 'Backend\StaffController@departmentSatff')->name('admin.staff.department');
    });


    // Teacher Routes
    Route::group(['prefix' => 'teacher'], function(){
        Route::get('/', 'Backend\TeacherController@index')->name('admin.teacher.index');
        Route::get('/add', 'Backend\TeacherController@create')->name('admin.teacher.create');
        Route::post('/add', 'Backend\TeacherController@store')->name('admin.teacher.store');
        Route::get('/edit/{id}', 'Backend\TeacherController@edit')->name('admin.teacher.edit');
        Route::post('/edit/{id}', 'Backend\TeacherController@update')->name('admin.teacher.update');
        Route::post('/delete/{id}', 'Backend\TeacherController@destroy')->name('admin.teacher.delete');
        Route::get('/{id}', 'Backend\TeacherController@departmentTeacher')->name('admin.teacher.department');
    });


    // Dean Routes
    Route::group(['prefix' => 'dean'], function(){
      Route::get('/', 'Backend\DeanController@index')->name('admin.dean.index');
      Route::get('/add', 'Backend\DeanController@create')->name('admin.dean.create');
      Route::post('/add', 'Backend\DeanController@store')->name('admin.dean.store');
      Route::get('/edit/{id}', 'Backend\DeanController@edit')->name('admin.dean.edit');
      Route::post('/edit/{id}', 'Backend\DeanController@update')->name('admin.dean.update');
      Route::post('/delete/{id}', 'Backend\DeanController@destroy')->name('admin.dean.delete');
      Route::get('/present/{id}', 'Backend\DeanController@presentDean')->name('admin.dean.present');
      Route::get('/previous/{id}', 'Backend\DeanController@previousDean')->name('admin.dean.previous');
    });


    // Settings Routes
    Route::group(['prefix' => 'setting'], function(){
        Route::get('/', 'Backend\SettingController@index')->name('admin.setting.index');
        Route::post('/add', 'Backend\SettingController@store')->name('admin.setting.store');;
    });

});
