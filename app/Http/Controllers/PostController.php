<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Like;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
    //

    public function getDashboard()
    {
        # code...
        $posts = Post::orderBy('created_at','desc')->get();
        return view('dashboard')->with(['posts'=>$posts]);
    }
    public function postCreate(Request $request)
    {
    	# code...

    	$this->validate($request,[
    			'body' => 'required|min:10|max:1000'

    		]);
    	$post = new Post;
    	$post->body = $request['body'];
    	$message = "There was an error";
    	if($request->user()->posts()->save($post))///post the posts as to  authnticated user
    	{
    		$message = "Post successfully added";
        	
    	}
    	return redirect()->route('dashboard')->with(['message'=>$message]);
    }

    public function getDeletepost($post_id)
    {
    	# code...
       $post = Post::where('id',$post_id)->first();
       if(Auth::user() != $post->user){
       	return redirect()->back();
       }
       $post->delete();
       return redirect()->route('dashboard')->with(['message'=>"successfully deleted"]);
   
    }

    public function postedit(Request $request)
    {
                # code...
        $this->validate($request,[
                'body' => 'required|min:10|max:1000'

            ]);
       $post = Post::where('id',$request['postId'])->first();
       $post->body = $request['body'];
       $post->update();
       return response()->json(['msg-body'=>$request['body']],200);
   
    }

    public function postLikePost(Request $request)
    {
      # code...
      $post_id = $request['postId'];
        $is_like = $request['isLike'] === 'true';
        $update = false;
        $post = Post::find($post_id);
        if (!$post) {
            return null;
        }
        $user = Auth::user();
        $like = $user->likes()->where('post_id', $post_id)->first();
        if ($like) {
            $already_like = $like->like;
            $update = true;
            if ($already_like == $is_like) {
                $like->delete();
                return null;
            }
        } else {
            $like = new Like();
        }
        $like->like = $is_like;
        $like->user_id = $user->id;
        $like->post_id = $post->id;
        if ($update) {
            $like->update();
        } else {
            $like->save();
        }
        return response()->json(['msg-body'=>$post->likes->where('like',1)->count()],200);
        }
}
