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
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get("/admin/login","Admin\loginController@login");//后台登陆显示
Route::get('/admin/getcode',"Admin\loginController@getCode"); //加载验证码
Route::post("/admin/dologin","Admin\loginController@doLogin");//执行登录
Route::get('/admin/logout', "Admin\loginController@logout");//退出登录

//====================后台中间件===========,==============>

Route::group(['prefix' => 'admin','middleware' =>'admin'], function () {

    Route::get('/','Admin\IndexController@index');//后台首页

//==管理员信息
Route::get('users', 'Admin\UsersController@index');//显示管理员信息
Route::get('users/create', 'Admin\UsersController@create');//显示添加管理员信息
Route::post('users/store', 'Admin\UsersController@store');//加管理员+ajax
Route::get('users/{id}/edit',"Admin\UsersController@edit");//显示编辑管理信息
Route::put('users/update/{id}',"Admin\UsersController@update");//修改管理信息
Route::delete('users/{id}',"Admin\UsersController@destroy");//删除

//==管理员角色
Route::get('role','Admin\RoleController@index');//显示管理员角色
Route::get('role/create','Admin\RoleController@create');//显示添加管理员角色信息
Route::post('role/store','Admin\RoleController@store');//添加管理员角色信息
Route::get('role/{id}/edit','Admin\RoleController@edit');//显示编辑管理员角色信息
Route::put('role/update/{id}','Admin\RoleController@update');//执行修改管理员角色信息
Route::delete('role/{id}',"Admin\RoleController@destroy");//删除

//==管理员权限
Route::get('node','Admin\NodeController@index');//显示管理员权限
Route::get('node/create','Admin\NodeController@create');//显示添加管理员权限
Route::post('node/store','Admin\NodeController@store');//执行添加管理员权限
Route::get('node/{id}/edit','Admin\NodeController@edit');//显示编辑管理员权限
Route::put('node/update/{id}','Admin\NodeController@update');//执行修改管理员权
Route::delete('node/{id}','Admin\NodeController@destroy');//删除

//===ajax权限
Route::get('users/loadRole/{uid}',"Admin\UsersController@loadRole");//加载用户分配角色管理
Route::post('users/saveRole',"Admin\UsersController@saveRole");//加载用户分配节点管理
Route::get('role/loadNode/{rid}',"Admin\RoleController@loadNode");//加载角色分配权限管理
Route::post('role/saveNode',"Admin\RoleController@saveNode");//加载角色分配权限管理

});