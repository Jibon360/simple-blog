<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->get();
        $categories = Category::latest()->get();
        return view('backend.pages.post.index', compact(['posts', 'categories']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::latest()->get();
        return view('backend.pages.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // id	post_tittle	post_descriptions	post_image	category_id	user_id	created_at	updated_at
        $request->validate([
            'post_tittle' => 'required',
            'post_descriptions' => 'required',
            'post_image' => 'required',
            'category_id' => 'required',

        ]);
        $post_image = $request->file('post_image');
        $post_imagename = hexdec(uniqid()) . '.' . $post_image->getClientOriginalExtension();
        $post_imageurl = "upload/PostImage/" . $post_imagename;
        $request->post_image->move(public_path("upload/PostImage"), $post_imagename);

        Post::insert([
            'post_tittle' => $request->post_tittle,
            'post_descriptions' => $request->post_descriptions,
            'post_image' => $post_imageurl,
            'category_id' => $request->category_id,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('post.index')->with('message', 'Post Created Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::latest()->get();

        return view('backend.pages.post.edit', compact(['post', 'categories']));
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
        if ($request->file('post_image')) {
            $request->validate([
                'post_tittle' => 'required',
                'post_descriptions' => 'required',
                'post_image' => 'required',
                'category_id' => 'required',

            ]);
            $post_image = $request->file('post_image');
            $post_imagename = hexdec(uniqid()) . '.' . $post_image->getClientOriginalExtension();
            $post_imageurl = "upload/PostImage/" . $post_imagename;
            $request->post_image->move(public_path("upload/PostImage"), $post_imagename);

            Post::findOrFail($id)->update([
                'post_tittle' => $request->post_tittle,
                'post_descriptions' => $request->post_descriptions,
                'post_image' => $post_imageurl,
                'category_id' => $request->category_id,
                'user_id' => Auth::user()->id,
                'updated_at' => Carbon::now(),
            ]);
        } else {
            $request->validate([
                'post_tittle' => 'required',
                'post_descriptions' => 'required',
                'category_id' => 'required',

            ]);


            Post::findOrFail($id)->update([
                'post_tittle' => $request->post_tittle,
                'post_descriptions' => $request->post_descriptions,
                'category_id' => $request->category_id,
                'user_id' => Auth::user()->id,
                'updated_at' => Carbon::now(),
            ]);
        }

        return redirect()->route('post.index')->with('message', 'Post Updated Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::findOrFail($id)->delete();
        return redirect()->route('post.index')->with('message', 'Post Delete Success');
    }
}
