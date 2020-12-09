<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Arr;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $key = 'POSTS.ALL';
        $posts =  cache()->remember($key,now()->addMinutes(5),function(){
           return  Post::all();
        });
        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
       $categories = Category::all();
      return view('posts.create')->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'title'=>'required',
            'body'=>'required'
        ]);
        $categories= Category::all();
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->post_date = $request->input('date');
        $post->post_time = $request->input('time');
        $cat_list=array();
        //dd($categories);
        //dump($request->all());
        foreach($categories as $category){
         if($request->has('CatId_'.$category->id))
          {
           array_push($cat_list,$category->id);
          }       
        }
        $post->save();
        $post->categories()->attach($cat_list);
        cache()->flush();
        return redirect('/posts')->with('sucess','Post Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {      
      $key = 'POSTS.ID.'.$id;
      $post_res = cache()->remember($key,now()->addMinutes(5),function()use($id){
         $post = Post::all();
         return $post->find($id);
          
      });
      $category_names = array();
      $categories=$post_res->categories;
      if (count($categories)>0)
       {
        for ($i=0;$i<count($categories);$i++)
          {
            $name = $categories[$i]->getAttributes();
            array_push($category_names,$name['name']);
          }
       }
       //dd($category_names);
      return view('posts.show')->with(['post'=>$post_res,'categories'=>$category_names]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::find($id);
        return view('posts.edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
            'title'=>'required',
            'body'=>'required'
        ]);

        $post =  Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();
        cache()->flush();
        return redirect('/posts')->with('success','Post Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::find($id);
        $post->delete();
        cache()->flush();
        return redirect('/posts')->with('success','Post Deleted');
    }
}
