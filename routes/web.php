<?php
 Route::get('/', 'HomePageController@index');
 Route::get('search', 'HomePageController@table')->name('search');
 Route::resource('student', 'HomePageController');
 Route::get('generate-pdf/{id}','HomePageController@generatePDF');

//  $this->post('/student/store', 'HomePageController@store');
 Route::get('courses/{course}', 'HomePageController@course')->name('course');
 Route::get('students/{student}', 'HomePageController@student')->name('student');

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index');
    
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('courses', 'Admin\CoursesController');
    Route::post('courses_mass_destroy', ['uses' => 'Admin\CoursesController@massDestroy', 'as' => 'courses.mass_destroy']);
    Route::post('courses_restore/{id}', ['uses' => 'Admin\CoursesController@restore', 'as' => 'courses.restore']);
    Route::delete('courses_perma_del/{id}', ['uses' => 'Admin\CoursesController@perma_del', 'as' => 'courses.perma_del']);
    Route::resource('students', 'Admin\StudentsController');
    Route::post('students_mass_destroy', ['uses' => 'Admin\StudentsController@massDestroy', 'as' => 'students.mass_destroy']);
    Route::post('students_restore/{id}', ['uses' => 'Admin\StudentsController@restore', 'as' => 'students.restore']);
    Route::delete('students_perma_del/{id}', ['uses' => 'Admin\StudentsController@perma_del', 'as' => 'students.perma_del']);
    

});
