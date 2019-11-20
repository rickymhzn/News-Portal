<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class ListingPageController extends Controller
{
    public function index()
    {
        return view('frontend.listing');
    }
    public function listing($id)
    {
        $posts = Post::with(['comments','category','creator'])->where('status',1)->where('created_by',$id)->orderBy('id','DESC')->paginate(5);

        return view('frontend.listing',compact('posts'));
    }
    public function listing1($id)
    {
        $posts = Post::with(['comments','category','creator'])->where('status',1)->where('category_id',$id)->orderBy('id','DESC')->paginate(5);

        return view('frontend.listing',compact('posts'));
    }
}
