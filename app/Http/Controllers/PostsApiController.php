<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostsApiController extends Controller
{
    CONST CACHE_KEY = 'POSTS';
    //
   public function getAll(){
     $key = self::CACHE_KEY.'.All';
     return  cache()->remember($key,now()->addMinutes(5),function(){
         return Post::all();
     });
   } 
   public function getByID(int $id){
    $key = self::CACHE_KEY.'.ID.'.$id;
    return  cache()->remember($key,now()->addMinutes(5),function() use($id){
        $posts = Post::all();
        return $posts->find($id);
    });
  } 

}
