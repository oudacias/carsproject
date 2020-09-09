<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    public function user()
    {
        return $this->belongsToMany('App\Article','user_article');
    }








    public static function insererArticle($titre,$texte,$categorie,$image,$lien_youtube){
        $article = new Article();
        $article->titre = $titre;
        $article->texte = nl2br($texte);
        $article->categorie = $categorie;
        $image_path = $article->titre.'.'.$image->getClientOriginalExtension();
        $image->move(public_path('/image_uploads'), $image_path);
        $article->lien_image = '/image_uploads/'.$image_path;
        $article->lien_youtube = $lien_youtube;
        $article->save();
    }
    public static function ModifierArticle($id_article,$titre,$texte,$lien_youtube){
        $article = Article::find($id_article);
        $article->titre = $titre;
        $article->texte = nl2br($texte);
        $article->lien_youtube = $lien_youtube;
        $article->save();
    }
}
