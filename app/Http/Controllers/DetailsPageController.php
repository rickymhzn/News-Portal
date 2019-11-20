<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class DetailsPageController extends Controller
{
    public function index($slug)
    {
        $post = Post::with(['creator','category','comments'])->where('status',1)->where('slug',$slug)->first();
        $post->view_count = $post->view_count+1;
        $related_news = Post::with(['creator','category','comments'])->where('status',1)->where('id','!=',$post->id)->where('category_id',$post->category_id)->orderBy('id','DESC')->limit(4)->get();
        $post->save();
        return view('frontend.details',compact('post','related_news'));
    }
    public function comment(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'comment' => 'required',
            'post_id' => 'required'
        ]);
        $comment = new Comment();
        $comment->name =$request->name;
        $comment->status = 0;
        $comment->comment = $request->comment;
        $comment->post_id = $request->post_id;
        $comment->save();
        return redirect()->route('details',['slug'=>$request->slug]);

    }
}
