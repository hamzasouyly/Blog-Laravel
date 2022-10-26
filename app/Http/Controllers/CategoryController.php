<?php

namespace App\Http\Controllers;


use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::all();

        return view('categories') -> with([
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->authorize('create', Post::class);
        $categories = Category::all();
        return view('create_category') -> with([
            'categories' => $categories
        ]);
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
        if ($request->has('image')) {
            $file = $request->image;
            $image_name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $image_name);
        }
    
        // $this->validate($request, [
        //     'title' => 'required|unique:posts|max:255',
        //     'body' => 'required|min:10'
        // ]);

        Category::create([
        'title' => $request->title,
        'slug' => Str::slug($request->title),
        'body' => $request->body,
        'image' => $image_name,
        'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('categories.index') -> with([
            'success' => 'article ajoute'
        ]);;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
         // $post = Post::find($slug);
         $category = Category::where('slug',$slug)->first();

         return view('show_categoryPosts') -> with([
             'category' => $category
         ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        //
        $this->authorize('create', Post::class);
        // $post = Post::find($slug);
        $category = Category::where('slug',$slug)->first();

        return view('edit_category') -> with([
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        //
        $this->authorize('create', Post::class);

        $category = Category::where('slug',$slug)->first();

        if ($request->has('image')) {
            $file = $request->image;
            $image_name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $image_name);
            unlink(public_path('uploads') . '/' . $category->image);
            $category->image = $image_name;
        }

        $category->update([
            'title' => $request->title,
            'body' => $request->body,
            'slug' => Str::slug($request->title),
            'image' => $category->image,
            'user_id' => auth()->user()->id,
            ]);

            return redirect()->route('categories.index') -> with([
                'success' => 'article Updated'
            ]);;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        //

        $this->authorize('create', Post::class);
        
        $category = Category::where('slug',$slug)->first();
        if (file_exists(public_path('uploads') . '/' . $category->image)) {
            
            unlink(public_path('uploads') . '/' . $category->image);

        }
        

       $category->delete();

       return redirect()->route('categories.index') -> with([
        'success' => 'article deleted'
    ]);;
    }
}
