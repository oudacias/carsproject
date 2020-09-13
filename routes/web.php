<?php

use Illuminate\Support\Facades\Route;
use App\Article;
use App\Boutique;

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
Route::get('Admin/Admin_forum_confirm/{id}','AdminController@Confirmerforums');
Route::get('Admin/supprimer_users/{id}','AdminController@SupprimerUser');
Route::get('Admin/confirmer_users/{id}','AdminController@ConfirmerUser');
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
Route::get('Admin/Admin_click', 'AdminController@afficherVoitureClick');
Route::get('Admin/confirmer_voiture/{id}', 'AdminController@confirmerVoiture');
Route::get('Admin/supprimer_voiture/{id}', 'AdminController@supprimerVoiture');
Route::get('Admin/Admin_contact', 'AdminController@contacts');
Route::get('Admin/Admin_contacts/{id}', 'AdminController@supprimercontacts');
Route::post('Admin/Admin_categorie', 'ArticleController@AjouterCategorie');
Route::get('Services/diagnosticpdf/{id}', 'ServiceController@diagnostiquetoPDF');
Route::get('Services/suivipdf/{id}', 'ServiceController@suivitoPDF');
Route::get('Services/voiturepdf/{id}', 'AdminController@voiturePDF');
Route::post('Admin/Admin_forum/', 'ForumController@AjouterTheme');

});
Route::get('Services/service_diagnostic', 'ServiceController@indexdiagnostic');

Route::get('Articles/Articles','ArticleController@articles');
Route::get('Articles/Article/{id}','ArticleController@article');
Route::get('Forum/Forums', 'ForumController@index');
Route::post('Forum/Forums', 'ForumController@ajouterSujet');
Route::get('Forum/Forums/{id}', 'ForumController@Forum');
Route::post('Forum/Forum/', 'ForumController@Sujet');
Route::post('Forum/Forums/Comment', 'ForumController@insertComment');

Route::post('Services/service_diagnostic', 'ServiceController@ajouterdiagnostic');
Route::post('Services/service_suivi', 'ServiceController@ajoutersuivi');
Route::get('Services/service_suivi', 'ServiceController@indexsuivi');
Route::get('Boutique/boutique', 'BoutiqueController@indexboutique');
Route::get('Boutique/boutique/{id}', 'BoutiqueController@indexboutique');
Route::post('Boutique/nouvelle_boutique', 'BoutiqueController@ajouterBoutique');
Route::get('Boutique/voitureDetails/{id}', 'VoitureController@VoitureDetails');
Route::get('Contact/contact', 'UserController@contactme');
Route::post('Contact/contact', 'UserController@AddContact');
Route::post('Forum/Forums/', 'ForumController@TrouverTheme');
Route::get('Forum/Forum/{themes}', 'ForumController@DeleteTheme');
Route::get('Boutique/boutique_voiture/{id}', 'VoitureController@TrouverBoutique');

Route::post('Article/Articles/', 'ArticleController@TrouverCategorie');
Route::get('Article/Articles/{categorie}', 'ArticleController@DeleteCategorie');
Route::post('Boutique/boutique', 'UserController@ChercherVoiture');
Route::post('Boutique/voitureDetails', 'VoitureController@NumberClick');




Route::group(['middleware' => ['auth','can:utilisateur']], function () {
Route::get('profile', 'UserController@index');
Route::post('profile/profile', 'UserController@modifierProfile');
Route::post('profile', 'UserController@ajouterVoiture');
Route::get('boutique/voiture', 'VoitureController@FormVoiture');
Route::get('boutique/nouvelle_boutique', 'BoutiqueController@NewBoutique');
Route::get('Voiture/remove/{id}', 'UserController@removeCar');
Route::get('User/myForums', 'UserController@AfficherForum');
Route::get('User/myComments', 'UserController@AfficherComments');
Route::get('User/myArticles', 'UserController@AfficherArticles');
Route::get('User/SupprimerForum/{id}', 'UserController@SupprimerForum');
Route::get('User/SupprimerCommentaire/{id}', 'UserController@SupprimerCommentaire');
Route::get('User/AjouterArticle/{id}', 'UserController@AjouterArticle');
Route::get('User/SupprimerFavoris/{id}', 'UserController@SupprimerFavoris');
});



Auth::routes();

Route::get('/', function(){
        $articles = Article::orderBy('created_at','desc')->limit(4)->get();
        $boutique = Boutique::all()->sortByDesc('created_at');
        return view('home',['artc'=>$articles,'boutique'=>$boutique]);
}
);





