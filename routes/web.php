<?php

use Illuminate\Support\Facades\Route;
use App\Article;

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


Route::group(['middleware' => ['auth','can:administrateur']], function () {
Route::get('Admin/Nouvel_article','ArticleController@index');
Route::post('Admin/Nouvel_article','AdminController@insererArticle');
Route::get('Admin/Admin_articles','ArticleController@index');
Route::get('Admin/Admin_articles','AdminController@articles');
Route::get('Admin/Admin_articles/{id}','AdminController@SupprimerArticle');
Route::get('Admin/ModifierArticle/{id}','AdminController@Article');
Route::post('Admin/ModifierArticle/','AdminController@ModifierArticle');
Route::get('Admin/Admin_forum','AdminController@Forum');
Route::get('Admin/Admin_forum/{id}','AdminController@SupprimerForum');
Route::get('Admin/Admin_forum_confirm/{id}','AdminController@ConfirmerForums');
Route::get('Admin/Admin_users/{id}','AdminController@SupprimerUser');
Route::get('Admin/Admin_users','AdminController@listusers');
Route::get('auth/login_admin','AdminController@login');


});

Route::get('Articles/Articles','ArticleController@articles');
Route::get('Articles/Article/{id}','ArticleController@article');
Route::get('Forum/Forums', 'ForumController@index');
Route::post('Forum/Forums', 'ForumController@ajouterSujet');
Route::get('Forum/Forums/{id}', 'ForumController@Forum');

Auth::routes();

Route::get('/', function(){
        $articles = Article::orderBy('created_at','desc')->limit(4)->get();
        return view('home',['artc'=>$articles]);
}
);

