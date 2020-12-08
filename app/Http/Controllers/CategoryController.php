<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //
  public function create()
   {
    return view('categories.create');
   }  
  public function store(Request $request)
   {
    $this->validate($request,[
        'name'=>'required'
    ]);

    $category = new Category;
    $category->name = $request->input('name');
    $category->save();
    return redirect('/')->with('sucess','Category Created');
   } 
}
