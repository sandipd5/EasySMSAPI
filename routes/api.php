<?php

use Illuminate\Http\Request;

Route::group(['prefix' => 'v1'], function () {
        //loginuser
        Route::post('login', 'AuthController@authenticate');
        //register,delete user
        Route::group(['middleware' =>['jwt.verify','role:admin']], function(){
            Route::post('register','AuthController@register');
            Route::delete('deleteuser/{id}','AuthController@deleteUser');
            Route::get('getallusers','AuthController@getallusers');

        });

        //get user
        Route::group(['middleware' => ['jwt.verify','ability:admin|reseller,list-user']], function() {
                Route::get('user', 'AuthController@getAuthenticatedUser');

            });
            //update user
        Route::group(['middleware' => ['jwt.verify']], function(){
            Route::put('updateuser/{id}','AuthController@updateUser');
        });

            //logout user
        Route::group(['middleware' => ['jwt.verify']], function(){

                Route::post('logout', 'AuthController@logout');
            });
            //roles and permissions
        Route::group(['middleware' => ['jwt.verify','ability:admin,assign-role|create-role|create-permissions|attach-permissions']], function(){

                Route::post('assign-role', 'AuthController@assignRole');
                Route::post('attach-permission', 'AuthController@attachPermission');
                Route::post('role', 'AuthController@createRole');
                Route::post('permission', 'AuthController@createPermission');
            });
            //refresh

        Route::middleware('jwt.refresh')->get('/token/refresh', 'AuthController@refresh');

        //contactlist crud
        Route::resource('contactlists', 'ContactListController');

        //contactnumbers
        Route::post('insertsinglecontact/{id}','ContactNumberController@insertsingle');
        Route::post('insertmultiplecontact','ContactNumberController@insertmultiple');
        Route::post('importcontact','ContactNumberController@import');
        Route::delete('deletecontact/{contactlistid}/{id}','ContactNumberController@deletecontact');
        Route::get('showallcontacts/{id}','ContactNumberController@showcontacts');
        Route::put('updatecontactnumber/{contactlistid}/{id}','ContactNumberController@updatecontact');

        //operators
        Route::get('getoperators','OperatorController@index')->name('alloperators');
        Route::get('showoperator/{id}','OperatorController@show');
        Route::post('storeoperator','OperatorController@store');
        Route::put('updateoperator/{operator}','OperatorController@update');
        Route::delete('deleteoperator/{operator}','OperatorController@destroy');

        //senderid_management
        Route::get('getallsenderid','SenderidManagementController@index')->name('allsenderid');
        Route::post('addsenderid','SenderidManagementController@addSenderid');
        Route::get('getsenderid/{id}','SenderidManagementController@showbyId');
        Route::post('approveid/{id}','SenderidManagementController@approveSenderid');
        Route::post('disapproveid/{id}','SenderidManagementController@disapproveId');

        //sendsms
        Route::post('/sendsms','SendSmsController@sendSms');



    });
