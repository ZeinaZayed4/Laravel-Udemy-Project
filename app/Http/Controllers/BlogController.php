<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use App\Models\Category;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
//        if (Auth::check()) {
//            $categories = Category::get();
//            return view('theme.blog.create', compact('categories'));
//        }
//        abort(403);

        $categories = Category::get();
        return view('theme.blog.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        $data = $request->validated();
        $image = $request->image;
        $newImageName = time() . '_' . $image->getClientOriginalName();
        $image->storeAs('blogs', $newImageName, 'public');
        $data['image'] = $newImageName;
        $data['user_id'] = Auth::user()->id;

        Blog::create($data);
        return back()->with('createBlogSuccess', 'Your blog has been saved successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('theme.single-blog', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        if ($blog->user_id === Auth::user()->id) {
            $categories = Category::get();
            return view('theme.blog.edit', compact('categories', 'blog'));
        }
        abort(403);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        if ($blog->user_id === Auth::user()->id) {
            $data = $request->validated();

            if ($request->hasFile('image')) {
                Storage::delete("public/blogs/$blog->image");
                $image = $request->image;
                $newImageName = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('blogs', $newImageName, 'public');
                $data['image'] = $newImageName;
            }

            $blog->update($data);
            return back()->with('updateBlogSuccess', 'Your blog has been updated successfully');
        }
        abort(403);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        if ($blog->user_id === Auth::user()->id) {
            Storage::delete("public/blogs/$blog->image");
            $blog->delete();
            return back()->with('deleteBlogSuccess', 'Your blog has been deleted successfully.');
        }
        abort(403);
    }

    public function myBlogs()
    {
        if (Auth::check()) {
            $blogs = Blog::where('user_id', '=', Auth::user()->id)->paginate(10);
            return view('theme.blog.my-blogs', compact('blogs'));
        }
        abort(403);
    }
}
