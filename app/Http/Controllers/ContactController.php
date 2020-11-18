<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Companysocial;
use App\Seodata;
use App\Pagedata;

class ContactController extends Controller
{
    public function contactme()
    {
        $page_contact = Pagedata::where('page',"=","Contact")->orderBy('created_at','desc')->first();
        $seo_contact = Seodata::where('page',"=","Contact")->orderBy('created_at','desc')->first();
        $social = Companysocial::find(1);
        return view('Contact/contact',['social'=>$social,'seo_contact'=>$seo_contact,'page_contact'=>$page_contact]);
    }
}
