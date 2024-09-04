<?php
use App\Http\Controllers;
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

#Dashboard page

Route::get('/','DashBoardController@index');

#navigator 
Route::get('/navigators','MenusController@navigators'); 



#Expenses Module
Route::prefix('expenses')->group(function () {
    Route::get('/','ExpensesController@index');
    Route::post('/insert','ExpensesController@insertNewExpenses')->name('newExpenses');
    Route::get('/showExpenses','ExpensesController@showExpenses')->name('showExpenses');
    Route::post('/processExpenses','ExpensesController@processExpenses')->name('processExistingExpenses');
    Route::post('/editExpenses','ExpensesController@editExpenses')->name('editExpenses');
    Route::get('/showExpenses/{encrypt}','ExpensesController@displayExpenses');
    Route::post('/deleteExpenses','ExpensesController@deleteExpenses');
});

#Savings Route
Route::prefix('savings')->group(function () {
    Route::get('/','SavingsController@index');
});
