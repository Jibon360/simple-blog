<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class Frontedncontroller extends Controller
{
    public function homepage()
    {
        $posts = Post::latest()->paginate(5);
        $categories = Category::latest()->get();


        return view('frontend.pages.index', compact(['posts', 'categories']));
    }
    public function singleblog($id)
    {
        $singlepost = Post::findOrFail($id);
        $relatedposts = Post::where('category_id', $singlepost->category_id)->where('id', '!=', $singlepost->id)->get();
        // return $relatedposts;
        return view('frontend.pages.single-blog', compact('singlepost', 'relatedposts'));
    }

    public function search(Request $request)
    {
        $search_box = $request->search_box;
        $request->validate([
            'search_box' => 'required',
        ]);


        $searchresutl = Post::where('post_tittle', 'like', '%' . $search_box . '%')->paginate(5);
        // dd($searchresutl);
        return view('frontend.pages.search', compact('searchresutl'));
    }
}
