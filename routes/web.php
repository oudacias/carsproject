<?php

use Illuminate\Support\Facades\Route;
use App\Article;
use App\Boutique;
use App\Publicite;
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
Route::post('Admin/searchArticle','AdminController@searchArticle');
Route::get('Admin/Admin_articles/{id}','AdminController@SupprimerArticle');
Route::get('Admin/ModifierArticle/{id}','AdminController@Article');
Route::post('Admin/ModifierArticle/','AdminController@ModifierArticle');
Route::get('Admin/Admin_forum','AdminController@Forum');
Route::post('Admin/searchForum/','AdminController@searchForum');
Route::get('Admin/Admin_forum/{id}','AdminController@SupprimerForum');
Route::get('Admin/Admin_forum_confirm/{id}','AdminController@Confirmerforums');
Route::get('Admin/supprimer_users/{id}','AdminController@SupprimerUser');
Route::get('Admin/confirmer_users/{id}','AdminController@ConfirmerUser');
Route::get('Admin/Admin_users','AdminController@listusers');
Route::post('Admin/searchUsers','AdminController@searchUsers');
Route::get('auth/login_admin','AdminController@login');
Route::get('Admin/Admin_diagnostic','ServiceController@afficherDiagnostic');
Route::get('Admin/confirmer_suivi/{id}','AdminController@confirmerSuivi');
Route::get('Admin/supprimer_suivi/{id}','AdminController@supprimerSuivi');
Route::get('Admin/confirmer_diagnostic/{id}','AdminController@confirmerDiagnostic');
Route::get('Admin/supprimer_diagnostic/{id}','AdminController@supprimerDiagnostic');
Route::get('Admin/Admin_suivi', 'ServiceController@afficherSuivi');
Route::get('Admin/Admin_suivi', 'ServiceController@afficherSuivi');
Route::get('Admin/Admin_boutique', 'AdminController@afficherBoutique');
Route::post('Admin/searchBoutique', 'AdminController@searchBoutique');
Route::get('Admin/supprimer_boutique/{id}', 'AdminController@supprimerBoutique');
Route::get('Admin/Admin_voiture', 'AdminController@afficherVoiture');
Route::get('Admin/Admin_click', 'AdminController@afficherVoitureClick');
Route::get('Admin/supprimer_voiture/{id}', 'AdminController@supprimerVoiture');
Route::get('Admin/Admin_contact', 'AdminController@contacts');
Route::get('Admin/Admin_contacts/{id}', 'AdminController@supprimercontacts');
Route::post('Admin/Admin_categorie', 'AdminController@AjouterCategorie');
Route::get('Services/diagnosticpdf/{id}', 'ServiceController@diagnostiquetoPDF');
Route::get('Services/suivipdf/{id}', 'ServiceController@suivitoPDF');
Route::get('Services/voiturepdf/{id}', 'AdminController@voiturePDF');
Route::post('Admin/Admin_forum/', 'AdminController@AjouterTheme');
Route::get('Publicite/index/','PubliciteController@index');
Route::post('Publicite/index/','PubliciteController@ajouterPublicite');
Route::get('Publicite/supprimerPub/','PubliciteController@afficherPub');
Route::get('Publicite/supprimerPub/{id}','PubliciteController@supprimerPublicite');
Route::post('Admin/AjouterPub/','AdminController@AjouterPub');
Route::get('Admin/SupprimerPub/{id}','AdminController@SupprimerPub');
Route::post('Admin/AjouterPubArticle/','AdminController@AjouterPubArticle');
Route::get('Admin/SupprimerPubArticle/{id}','AdminController@SupprimerPubArticle');

});
Route::get('Services/service_diagnostic', 'ServiceController@indexdiagnostic');

Route::get('/MagazineEocars','ArticleController@articles');
Route::get('/MagazineEocars/{id}/{slug}','ArticleController@article');
Route::get('/MagazineEocars/{categorie}','ArticleController@TrouverCategorie');
Route::get('/ForumEocars', 'ForumController@index');
Route::get('/ForumEocars/{theme}', 'ForumController@indexTheme');
Route::get('/ForumEocars/{id}/{sujet_slug}', 'ForumController@Forum');
Route::post('/ForumEocars', 'ForumController@Sujet');
Route::post('/ForumEocars/Comment', 'ForumController@insertComment');

Route::post('Services/service_diagnostic', 'ServiceController@ajouterdiagnostic');
Route::post('Service-Suivi', 'ServiceController@ajoutersuivi');
Route::get('Service-Suivi', 'ServiceController@indexsuivi');
Route::get('BoutiqueEocars/', 'BoutiqueController@indexboutique');
Route::get('BoutiqueEocars/voitureDetails/{id}', 'VoitureController@VoitureDetails');
Route::get('Contact/', 'ContactController@contactme');

Route::get('BoutiqueEocars/{nom_boutique}', 'VoitureController@TrouverBoutique');

Route::post('Article/Articles/', 'ArticleController@TrouverCategorie');
Route::get('Article/Articles/{categorie}', 'AdminController@DeleteCategorie');
Route::get('Boutique/boutique', 'UserController@ChercherVoiture');
Route::get('Boutique/nom_boutique', 'UserController@ChercherVoitureBoutique');
Route::get('Boutique/ville_boutique', 'UserController@ChercherBoutiqueVille');
Route::get('Boutique/voiture', 'UserController@ChercherVoiture');
Route::get('Boutique/voituredetaillee', 'UserController@ChercherVoitureDetail');
Route::post('Boutique/voitureDetails', 'VoitureController@NumberClick');




Route::group(['middleware' => ['auth','can:utilisateur']], function () {
Route::get('profile', 'UserController@index');
Route::post('profile/profile', 'UserController@modifierProfile');
Route::post('profile', 'UserController@ajouterVoiture');
Route::get('BoutiqueEocars/{id}/voiture', 'VoitureController@FormVoiture');
Route::get('BoutiqueEocars/{id}/nouvelle_boutique', 'BoutiqueController@NewBoutique');
Route::post('BoutiqueEocars/nouvelle_boutique', 'BoutiqueController@ajouterBoutique');
Route::get('Voiture/remove/{id}', 'UserController@removeCar');
Route::get('Profile/Mes_Forums', 'UserController@AfficherForum');
Route::get('Profile/Mes_Commentaires', 'UserController@AfficherComments');
Route::get('Profile/Mes_Articles', 'UserController@AfficherArticles');
Route::get('User/SupprimerForum/{id}', 'UserController@SupprimerForum');
Route::get('User/SupprimerCommentaire/{id}', 'UserController@SupprimerCommentaire');
Route::get('User/AjouterArticle/{id}', 'UserController@AjouterArticle');
Route::get('User/SupprimerFavoris/{id}', 'UserController@SupprimerFavoris');
Route::post('profile/modifyBoutique', 'BoutiqueController@modifyBoutique');
Route::get('profile/supprimerBoutique/{id}', 'BoutiqueController@supprimerBoutique');
Route::post('profile/modifierImage/', 'BoutiqueController@modifierImage');
Route::get('modifierProfile', 'UserController@modifiermonProfile');
Route::post('modifierProfile', 'UserController@modifiermyProfile');
Route::get('close_notif/{id}', 'ForumController@closeNotification');
Route::get('voitureVendre/{id}', 'VoitureController@vendreVoiture');
});



Auth::routes();

Route::get('/', function(){
        $articles = Article::orderBy('created_at','desc')->limit(4)->get();
        $boutique = Boutique::all()->sortByDesc('created_at');
        $pub_g = Publicite::where('nom_page',"=",'/')->where('emplacement',"=",'Gauche')->orderBy('created_at','desc')->limit(1)->get();
        $pub_d = Publicite::where('nom_page',"=",'/')->where('emplacement',"=",'Droite')->orderBy('created_at','desc')->limit(1)->get();
        $pub_h = Publicite::where('nom_page',"=",'/')->where('emplacement',"=",'Haut')->orderBy('created_at','desc')->limit(1)->get();
        $pub_m = Publicite::where('nom_page',"=",'/')->where('emplacement',"=",'Milieu')->orderBy('created_at','desc')->limit(1)->get();
        return view('home',['artc'=>$articles,'boutique'=>$boutique,'pub_g'=>$pub_g,'pub_d'=>$pub_d,'pub_h'=>$pub_h,'pub_m'=>$pub_m]);
}
);






Route::get('send-mail', 'UserController@sendEmail');