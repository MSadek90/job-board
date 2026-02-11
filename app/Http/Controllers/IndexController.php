<?php

namespace App\Http\Controllers;



class IndexController extends Controller
{
    function index(){
        return view('Home',['PageTitle' => 'Home_Page']);
    }
    
    function about(){
        return view('about',['PageTitle' => 'About_Page']);
    }


    function contact(){
        return view('contact',['PageTitle' => 'Contact_Page']);
    }
}
