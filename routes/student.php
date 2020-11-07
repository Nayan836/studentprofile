<?php

Route::get('student-login','Student\LoginController@studentLogin')->name('student.login.get');
Route::post('student-login','Student\LoginController@login')->name('student.login');
Route::get('student-register','StudentController@studentRegister')->name('student.register');
Route::post('student-register','StudentController@submitRegister')->name('student.register.post');
Route::get('course-reg','StudentController@courseReg')->name('course.reg.get');
Route::post('course-reg','StudentController@submitReg')->name('course.reg.post');
Route::get('course-reg-edit/{id}','StudentController@courseEdit')->name('course.reg.edit');
Route::post('course-reg-update/{id}','StudentController@courseUpdate')->name("course.reg.update");
Route::get('course-reg-delete/{id}','StudentController@courseDelete')->name("course.reg.delete");




Route::group(['middleware'=>'auth:student'],function(){

  Route::get('dashboard','StudentController@dashboard')->name('student.dashboard');
  Route::post('student-logout','StudentController@studentLogout')->name('student.logout');
 

});
