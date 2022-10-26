<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Category;

class HomeController extends Controller
{
    //
    public function index(){
        $posts = Post::latest()->paginate(5);
        $categories = Category::all();
        return view('home') -> with([
            'posts' => $posts,
            'categories' => $categories
        ]);
    }

    public function show($slug){
        // $post = Post::find($slug);
        $post = Post::where('slug',$slug)->first();

        return view('show') -> with([
            'post' => $post
        ]);
    }

    public function create(){

        $this->authorize('create', Post::class);

        $categories = Category::all();
        return view('create') -> with([
            'categories' => $categories
        ]);
           
    }

    public function store(PostRequest $request){

        if ($request->has('image')) {
            $file = $request->image;
            $image_name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $image_name);
        }
    
        // $this->validate($request, [
        //     'title' => 'required|unique:posts|max:255',
        //     'body' => 'required|min:10'
        // ]);

        Post::create([
        'title' => $request->title,
        'slug' => Str::slug($request->title),
        'body' => $request->body,
        'image' => $image_name,
        'user_id' => auth()->user()->id,
        'category_id' => $request->category_id,
        
        ]);

        return redirect()->route('home') -> with([
            'success' => 'article ajoute'
        ]);;
    }

    public function edit($slug){
        $this->authorize('create', Post::class);
        // $post = Post::find($slug);
        $post = Post::where('slug',$slug)->first();
        $categories = Category::all();

        return view('edit') -> with([
            'post' => $post,
            'categories' => $categories
        ]);
    }

    public function update(PostRequest $request, $slug){
        $this->authorize('create', Post::class);

        $post = Post::where('slug',$slug)->first();

        if ($request->has('image')) {
            $file = $request->image;
            $image_name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $image_name);
            unlink(public_path('uploads') . '/' . $post->image);
            $post->image = $image_name;
            
        }

        $post->update([
            'title' => $request->title,
            'body' => $request->body,
            'slug' => Str::slug($request->title),
            'image' => $post->image,
            'user_id' => auth()->user()->id,
            'category_id' => $request->category_id,
            ]);

            return redirect()->route('home') -> with([
                'success' => 'article Updated'
            ]);;
    }

    public function delete($slug){
        $this->authorize('create', Post::class);
        
        $post = Post::where('slug',$slug)->first();
        // if (file_exists(public_path('uploads') . '/' . $post->image)) {
            
        //     unlink(public_path('uploads') . '/' . $post->image);

        // }
        

       $post->delete();

       return redirect()->route('home') -> with([
        'success' => 'article deleted'
    ]);;
    }

    public function Forcedelete($slug){
        $this->authorize('create', Post::class);
        
        $post = Post:: withTrashed()->where('slug',$slug)->first();
        if (file_exists(public_path('uploads') . '/' . $post->image)) {
            
            unlink(public_path('uploads') . '/' . $post->image);

        }
        

       $post->forceDelete();

       return redirect()->route('home') -> with([
        'success' => 'article force deleted'
    ]);;
    }

    public function restore($slug){
        $this->authorize('create', Post::class);
        
        $post = Post::withTrashed()->where('slug',$slug)->first();
       
       $post->restore();

       return redirect()->route('home') -> with([
        'success' => 'article restored'
    ]);;
    }

    public function addToCart($slug){
        // $post = Post::find($slug);
        $post = Post::where('slug',$slug)->first();

        return view('show') -> with([
            'post' => $post
        ]);
    }
}
