<?php

namespace App\Http\Controllers;




use App\Http\Controllers\Controller;


use App\Events\PostCreated;
use App\Http\Requests\StorePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use App\Mail\PostCreated as MailPostCreated;
use App\Models\User;
use App\Notifications\PostCreated as NotificationsPostCreated;
// use Doctrine\Common\Cache\Cache;
use Illuminate\Support\Facades\Cache;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Cache as FacadesCache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification as FacadesNotification;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
        // $this->middleware('password.confirm')->only('edit');


    }
    public function index()
    {
        $user = User::first(); 
    //    dd($user->name);


        $response = Http::get('http://example.com');

        dd($response);
    
        $posts = Cache::remember('posts', 120, function () {
            return Post::latest()->get();
        });;


        // $posts = Post::latest()->get();
        return view('posts.index')->with('posts', $posts);

        
    }

    /*
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create')->with([
            'categories' => Category::all(),
            'tags' => Tag::all(), 

        ]);
    }

    public function store(StorePostRequest $request)
    {
        // dd($request);
    
        if($request->hasFile('photo')){
            $name = $request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('post-photos', $name); 

        }
        $post = Post::create([
            'user_id' => auth()->user()->id,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'short_content' => $request->short_content,
            'content' => $request->content,
            'photo' => $path ?? null,

        ]);

        if(isset($request->tags)){
            foreach ($request->tags as $tag){
                $post->tags()->attach($tag);
            }
            
        }

        PostCreated::dispatch($post);

        // auth()->user()->notify(new NotificationsPostCreated($post));

        FacadesNotification::send(auth()->user(), new NotificationsPostCreated($post));

        // Mail::to($request->user())->send(new MailPostCreated($post));

        return redirect()->route("posts.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {

        return view('posts.show')->with([
            'post' => $post,
            'recent_posts' => Post::latest()->get()->except($post->id)->take(5),
            'categories' => Category::all(),
            'tags' => Tag::all(), 
        
        ]);

        // $post = Post::find($id);

   
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        // Gate::authorize('update', $post);
        Gate::authorize('update', $post);

        return view('posts.edit')->with(['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePostRequest $request, Post $post)
    {

        // Gate::authorize('update', $post);

        if($request->hasFile('photo')){
            if(isset($post->photo)){
                Storage::delete($post->photo);
            }

            $name = $request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('post-photos', $name ); 

        }



        $post->update([
            'title' => $request->title,
            'short_content' => $request->short_content,
            'content' => $request->content,
            'photo' => $path ?? $post->photo,

        ]);

        return redirect()->route('posts.show', ['post' => $post->id]);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {

        // Gate::authorize('delete', $post);
        Gate::authorize('delete', $post);


        if(isset($post->photo)){
            Storage::delete($post->photo);
        }
        $post->delete();
        return redirect()->route("posts.index");
    }
}
