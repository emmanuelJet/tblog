<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class CommentsController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

  public function Dashboard()
	{
		$comments = Comment::orderBy('created_at','desc')->get();
		return view('front-end.single',['comments'=> $comments]);
	}


	public function CreateComment(Request $request) {
		$this->validate($request,[
			'body' => 'required|max:1000'
		]);
		$comment = new Comment();
		$comment->body = $request['body'];
		$message = "There is an error !" ;
		if($request->user()->comments()->save($comment))
		{
			$message = "Comment Created Successfully.";
		}
		return redirect()->route('comment')->with(['message'=> $message ]);
	}

	public function DeleteComment( $comment_id ) 
	{
		$comment = Comment::where('id',$comment_id)->first();
		if(Auth::user() != $comment->user)
		{
			return redirect()->back();
		}
		$comment->delete();
		return redirect()->route('comment')->with(['message' => 'Comment Deleted Successfully']);
	}

	public function UpdateComment(Request $request , $id) 
	{
		$this->validate($request,[
			'body' => 'required|max:1000'
		]);
		
		$comment = new Comment();
		$comment = Comment::where('id',$id)->first();
		$comment->body = $request['body'];
		$message = "There is an error !" ;
		if($request->user()->comments()->save($comment))
		{
			$message = "Comment Updated Successfully.";
		}
		return redirect()->route('comment')->with(['message'=> $message ]);
	}
}
