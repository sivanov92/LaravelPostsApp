<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Resources\Post as PostResource;

class PostsApiController extends Controller
{
    const CACHE_KEY = 'POSTS';
    //
    public function getAll()
    {
        $key = self::CACHE_KEY.'.All';
        return  cache()->remember($key, now()->addMinutes(5), function () {
            return new PostResource(Post::all());
        });
    }
    public function getByID(int $id)
    {
        $key = self::CACHE_KEY.'.ID.'.$id;
        return  cache()->remember($key, now()->addMinutes(5), function () use ($id) {
            $posts = Post::all();
            return new PostResource($posts->find($id));
        });
    }
    public function AddPost(Request $request)
    {
        $post = new Post;
        $post->title = $request->input('data.title');
        $post->body = $request->input('data.body');
        $post->post_date = $request->input('data.post_date');
        $post->post_time = $request->input('data.post_time');

        $cat_list=array();
        if ($request->has('data.categories')) {
            array_push($cat_list, $request->input('data.categories'));
        }
        $post->save();
        $post->categories()->attach($cat_list);
        cache()->flush();
        return response()->json([
        'message'=>'sucess',
        ]);
    }
}
