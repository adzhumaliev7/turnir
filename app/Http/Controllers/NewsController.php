<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Paginator;
use Illuminate\Support\Facades\DB;
class NewsController extends Controller
{
    public function index(){
        if(Auth::user() != null){
            $mail = Auth::user()->email;
			$active =  Auth::user()->verified;
        }
         else {$mail = null;
         $active = null;}
        $posts = DB::table('posts')->leftJoin('users' , 'posts.user_id', '=', 'users.id')->select('posts.*', 'users.name')->orderBy('posts.id','desc')->paginate(15);
    
        return view('main.news.index' ,compact('mail', 'posts', 'active'));
    } 

    public function show($id){
        if(Auth::user() != null){
            $mail = Auth::user()->email;
			$active =  Auth::user()->verified;
        }
       else {$mail = null;
         $active = null;}
        $post = Post::findOrFail($id);
        return view('main.news.show' , compact('mail','post', 'active'));
    }
}
