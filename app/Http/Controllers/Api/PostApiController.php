<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\PostsResource;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PostApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Post::limit(10)->get();
        return PostsResource::collection(Post::limit(10)->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('photo')){

            $name= $request->file('photo')->getClientOriginalName();
            $path= $request->file('photo')->storeAs('post-photo',$name);
        }

        $post = Post::create([
            'user_id'=>1,
            'category_id'=>$request->category_id,
            'title'=>$request->title,
            'short_content'=>$request->short_content,
            'content'=>$request->content,
            'photo'=>$path ?? null,
        ]);

        if(isset($request->tags)){
            foreach($request->tags as $tag){
                $post->tags()->attach($tag);
            }
        }
        return response(["message"=>"Api Successfully store"]);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
       return new PostsResource($post);
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

    return "ererer";
        
    }
}