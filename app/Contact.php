<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public static function AddContact($email,$sujet,$texte)        
    {
        $contact = new Contact();
        $contact->email = $email ;
        $contact->sujet = $sujet ;
        $contact->texte = $texte ;
        $contact->save();
    }
}
