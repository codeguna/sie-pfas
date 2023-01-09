<?php
Route::redirect('/', 'admin/home');

Auth::routes(['register' => false]);
// Google LOGIN
Route::get('auth/google', 'GoogleController@redirectToGoogle')->name('redirectGoogle');
Route::get('auth/google/callback', 'GoogleController@handleGoogleCallback')->name('googleCallback');
// END of Google LOGIN
// Change Password Routes...
Route::get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
Route::patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('permissions', 'Admin\PermissionsController');
    Route::delete('permissions_mass_destroy', 'Admin\PermissionsController@massDestroy')->name('permissions.mass_destroy');
    Route::resource('roles', 'Admin\RolesController');
    Route::delete('roles_mass_destroy', 'Admin\RolesController@massDestroy')->name('roles.mass_destroy');
    Route::resource('users', 'Admin\UsersController');
    Route::delete('users_mass_destroy', 'Admin\UsersController@massDestroy')->name('users.mass_destroy');

    Route::resource('facilities', 'FacilityController');
    Route::resource('employees', 'EmployeeController');
    Route::resource('lecturers', 'lecturerController');
    Route::resource('baps', 'BapController');
    // Custom Route BAPS
    Route::post('/baps/assignpetugas/{bap}', 'BapController@assignPetugas')->name('baps.assignpetugas');
    Route::post('/baps/setdonebap/{bap}', 'BapController@setDoneBap')->name('baps.setdonebap');
    Route::post('/baps/unsetdonebap/{bap}', 'BapController@unsetDoneBap')->name('baps.unsetdonebap');
    //Report Area
    Route::get('/bap/report', 'BapController@reportGeneral')->name('baps.reportgeneral');
    Route::get('/bap/selectreport', 'BapController@selectReportGeneral')->name('baps.selectreportgeneral');
    Route::get('/bap/facilitydamage', 'BapController@reportDamage')->name('baps.reportDamage');
    Route::get('/bap/selectfacilitydamage', 'BapController@selectReportDamage')->name('baps.selectreportDamage');
    Route::get('/bap/reportprocessed', 'BapController@reportProcessed')->name('baps.reportProcessed');
    Route::get('/bap/selectreportprocessed', 'BapController@selectReportProcessed')->name('baps.selectReportProcessed');    //End of Report Area

    // 
    Route::resource('rooms', 'RoomController');
    Route::resource('mata-kuliah', 'MataKuliahController');
});
