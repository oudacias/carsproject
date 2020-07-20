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
Route::get('/home', 'HomeController@index')->name('home');


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
Route::get('Admin/Admin_diagnostic','ServiceController@afficherDiagnostic');
Route::get('Admin/confirmer_suivi/{id}','AdminController@confirmerSuivi');
Route::get('Admin/supprimer_suivi/{id}','AdminController@supprimerSuivi');
Route::get('Admin/confirmer_diagnostic/{id}','AdminController@confirmerDiagnostic');
Route::get('Admin/supprimer_diagnostic/{id}','AdminController@supprimerDiagnostic');
Route::get('Admin/Admin_suivi', 'ServiceController@afficherSuivi');
Route::get('Admin/Admin_suivi', 'ServiceController@afficherSuivi');
Route::get('Admin/Admin_boutique', 'AdminController@afficherBoutique');
Route::get('Admin/confirmer_boutique/{id}', 'AdminController@confirmerBoutique');
Route::get('Admin/supprimer_boutique/{id}', 'AdminController@supprimerBoutique');
Route::get('Admin/Admin_voiture', 'AdminController@afficherVoiture');
Route::get('Admin/confirmer_voiture/{id}', 'AdminController@confirmerVoiture');
Route::get('Admin/supprimer_voiture/{id}', 'AdminController@supprimerVoiture');
Route::get('Admin/Admin_contact', 'AdminController@contacts');
Route::get('Admin/Admin_contacts/{id}', 'AdminController@supprimercontacts');

});
Route::get('Services/service_diagnostic', 'ServiceController@indexdiagnostic');

Route::get('Articles/Articles','ArticleController@articles');
Route::get('Articles/Article/{id}','ArticleController@article');
Route::get('Forum/Forums', 'ForumController@index');
Route::post('Forum/Forums', 'ForumController@ajouterSujet');
Route::get('Forum/Forums/{id}', 'ForumController@Forum');
Route::post('Forum/Forum/', 'ForumController@Sujet');
Route::post('Forum/Forums/', 'ForumController@insertComment');

Route::post('Services/service_diagnostic', 'ServiceController@ajouterdiagnostic');
Route::post('Services/service_suivi', 'ServiceController@ajoutersuivi');
Route::get('Services/service_suivi', 'ServiceController@indexsuivi');
Route::get('Boutique/boutique', 'BoutiqueController@indexboutique');
Route::post('Boutique/boutique', 'BoutiqueController@ajouterBoutique');
Route::get('Contact/contact', 'UserController@contactme');
Route::post('Contact/contact', 'UserController@AddContact');


Route::group(['middleware' => ['auth','can:utilisateur']], function () {
Route::get('profile', 'UserController@index');
Route::post('profile/profile', 'UserController@modifierProfile');
Route::post('profile', 'UserController@ajouterVoiture');
Route::get('/Voiture/remove/{id}', 'UserController@removeCar');


});



Auth::routes();

Route::get('/', function(){
        $articles = Article::orderBy('created_at','desc')->limit(4)->get();
        return view('home',['artc'=>$articles]);
}
);



Route::get('Services/diagnosticpdf/{id}', 'ServiceController@diagnostiquetoPDF');
Route::get('Services/suivipdf/{id}', 'ServiceController@suivitoPDF');
Route::get('Services/voiturepdf/{id}', 'AdminController@voiturePDF');
