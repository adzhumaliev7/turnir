<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\CustomClasses\ColectionPaginate;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class PostsController extends Controller
{
    public function posts()
    {
  
      $posts = Post::getAll();
      if($posts !=null) $posts = ColectionPaginate::paginate($posts, 15);
  
      return view('admin.home.posts.posts', [
        'posts' => $posts,
      ]);
    }
    public function posts_create()
    {
      return view('admin.home.posts.create');
    }
    public function posts_store(Request $request)
    {
      $validator = Validator::make($request->all(), [
        'title' => 'required',
        'text' => 'required',
      ]);
      Post::create(['title'=> $request->input('title'), 'user_id'=> Auth::user()->id,'text' => $request->input('text') ,'date'=>  $request->input('date')]);
      return redirect()->route('admin.posts');
    }

    public function edit($id){
        $posts = Post::findOrFail($id);
        $post_id = $id;
        return view('admin.home.posts.edit', compact('posts' ,'post_id'));
    }
    public function update($id, Request $request){
        $validated = $request->validate([
            'title' => 'required',
            'text' => 'required',
            'date' => '',
        ]);
         $product = Post::findOrFail($id);
          $product->update($validated); 
          \Session::flash('flash_meassage', 'Сохранено');
          return redirect()->route('admin.posts');   
    }
    public function destroy($id){
        $post = Post::findOrFail($id);
        $post->delete(); 
        \Session::flash('flash_meassage', 'Запись удалена');
        return redirect()->route('admin.posts'); 
    }
}
