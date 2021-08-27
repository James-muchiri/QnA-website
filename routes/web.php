<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Orders;
use App\Answers;
use App\Comments;
use App\Questions;
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
Route::get('/signin', function () {
    return view('auth.admin_login');
})->name('signin');

Route::post('/signIn', 'Auth\LoginController@signIn')->name('signIn');
Route::group(['middleware' => 'adminauth'], function () {

Route::get('/admin', 'AdminController@index')->name('admin');
Route::post('/admin/change_password', 'AdminController@change_password')->name('admin/change_password');
Route::get('/categories', 'AdminController@categories');

Route::get('/questions', 'AdminController@questions')->name('questions');

Route::get('/addquestions', 'AdminController@addquestions');
Route::get('/orders', 'AdminController@orders');
Route::get('/pendingorders', 'AdminController@pendingorders');
Route::get('/completedorders', 'AdminController@completedorders');
Route::post('/admin/post_category', 'AdminController@post_category')->name('post_category');

Route::post('/store_question', 'AdminController@store_questionn')->name('store_question');
Route::post('/update_question', 'AdminController@update_questionn')->name('update_question');
Route::get('/messages', 'AdminController@messages');
Route::post('/readcomment', 'AdminController@readcomentt');
Route::get('/account', 'AdminController@account');
Route::post('/account', 'AdminController@accountchange');
Route::post('/removeimage', 'AdminController@removeimage');
Route::post('/removeanswer', 'AdminController@removeanswer');
Route::get('/show_cartegories/{dataId}', 'AdminController@show_cartegories')->name('show_cartegories');
Route::get('/hide_cartegories/{dataId}', 'AdminController@hide_cartegories')->name('hide_cartegories');
Route::get('/show_product/{dataId}', 'AdminController@show_product')->name('show_product');
Route::get('/hide_product/{dataId}', 'AdminController@hide_product')->name('hide_product');
Route::get('/delete_product/{dataId}', 'AdminController@delete_product')->name('delete_product');
Route::post('/edit_product', 'AdminController@edit_product')->name('edit_product');
Route::get('/show_hidden_product/{dataId}', 'AdminController@show_hidden_product')->name('show_product');
Route::get('/hide_hidden_product/{dataId}', 'AdminController@hide_hidden_product')->name('hide_product');
Route::post('/admin/edit_category', 'AdminController@edit_category')->name('edit_category');
Route::post('/admin/edit_product', 'AdminController@edit_product')->name('edit_product');
Route::get('/showcategories', 'AdminController@showcategories');
Route::get('/hidecategories', 'AdminController@hidecategories');
Route::get('/frequentcategories', 'AdminController@frequentcategories');
Route::get('/hiddenquestions', 'AdminController@hiddenquestions');
Route::get('/searches', 'AdminController@searches');
Route::get('/missing', 'AdminController@missing');
Route::get('/browsers', 'AdminController@browser');
Route::get('/read/{dataId}', 'AdminController@read');


});



Route::get('/', 'UserController@index')->name('index');
Route::get('/answer/{dataId}', 'UserController@answers');
Route::get('/checkoutcart', 'UserController@checkoutcart');
Route::post('/checkout', 'UserController@checkout');
Route::post('/comments', 'UserController@comments');
Route::get('/success', 'UserController@success')->name('success');
Route::get('/addToCart/{dataId}', 'UserController@addToCart')->name('add');
Route::post('/savequiz', 'UserController@savequiz')->name('save');
Route::get('/getCart', 'UserController@getCart')->name('cart');
Route::get('/remove/{dataId}', 'UserController@getRemoveItem')->name('remove');
Route::post('/remove', 'UserController@getRemoveqiuz')->name('remove');

Route::get('/quiz', 'UserController@myquestion')->name('myquestion');
Route::get('/myorders', 'UserController@myorders')->name('orders');
Route::post('/myorders', 'UserController@myorder')->name('orders');
Route::get('paywithpaypal', array('as' => 'paywithpaypal','uses' => 'PaypalController@payWithPaypal',));
Route::post('paypal', array('as' => 'paypal','uses' => 'PaypalController@postPaymentWithpaypal',));
Route::get('paypal', array('as' => 'status','uses' => 'PaypalController@getPaymentStatus',));
Route::get('/completed', 'UserController@complete')->name('completed');
Route::get('/order/{dataId}', 'UserController@order')->name('order');
Route::get('/searchbycat/{dataId}', 'UserController@searchbycat')->name('searchbycat');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
