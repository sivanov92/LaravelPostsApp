<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
   public function index(){
       $title = 'Index';
       return view('pages.index')->with('tittle',$title);
   } 
   public function about(){
       return view('pages.about');
   }
}
