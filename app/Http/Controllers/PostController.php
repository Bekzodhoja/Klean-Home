<?php

namespace App\Http\Controllers;

use App\Events\PostCreat;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Events\Validated;
use App\Http\Requests\StorePostRequest;
use App\Jobs\ChangePost;
use App\Jobs\UploadBigFile;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth')->except(['show','index']);
       $this->authorizeResource(Post::class,'post');
    }

    public function index()
    {

        $posts= Post::latest()->paginate(9);

         return view('posts.index',compact('posts'));
    }


    public function create()
    {
        return view('posts.create')->with([
            'categories'=>Category::all(),
            'tags'=>Tag::all(),
        ]);
    }


    public function store(StorePostRequest $request)
    {
        if($request->hasFile('photo')){

            $name= $request->file('photo')->getClientOriginalName();
            $path= $request->file('photo')->storeAs('post-photo',$name);
        }

        $post = Post::create([
            'user_id'=>auth()->user()->id,
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
        PostCreat::dispatch($post);
        ChangePost::dispatch($post);
    }


    public function show(Post $post)
    {
        return view('posts.show')->with([
            'post'=>$post,
            'ret_posts'=>Post::latest()->get()->except($post->id)->take(5),
            'tags'=>Tag::all(),
            'categories'=>Category::all(),

    ]);

    }


    public function edit(Post $post)
    {


        return view('posts.edit')->with(["post"=>$post]);
    }


    public function update(Request $request, Post $post)
    {

        if($request->hasFile('photo')){

            if(isset($post->photo)){
                Storage::delete($post->photo);
            }
            $name=$request->file('photo')->getClientOriginalName();
            $path= $request->file('photo')->storeAs('post-photo',$name);
        }


        $post->update([
            'title'=> $request->title,
            'short_content'=>$request->short_content,
            'content'=>$request->content,
            'photo'=>$path ?? $post->photo
        ]);
        return redirect()->route('posts.show',['post'=>$post->id]);
    }


    public function destroy(Post $post)
    {

        if(isset($post->photo)){
            Storage::delete($post->photo);
        }
        $post->delete();
        return redirect()->route('posts.index');
    }
}
