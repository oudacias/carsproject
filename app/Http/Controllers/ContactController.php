<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Companysocial;

class ContactController extends Controller
{
    public function contactme()
    {
        $social = Companysocial::find(1);
        return view('Contact/contact',['social'=>$social]);
    }
}
