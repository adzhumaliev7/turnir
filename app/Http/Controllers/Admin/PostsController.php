<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\Admin\PostRequest;
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
    public function posts_store(PostRequest $request)
    {
    
       $name =  $request->file('label');
     
     $path = '/uploads/storage/img/posts';
     $file_name = $this->uploadFiles($name, $path);
  
      $data = $validated = $request->validated();
       Post::create(['title'=> $request->input('title'), 'user_id'=> Auth::user()->id,'text' => $request->input('text') , 'preview' => $request->input('preview') ,
      'date'=>  $request->input('date'), 'label'=> $file_name,]);
      
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
              'preview' => '',
            'date' => '',
        ]);

      if ($request->hasFile('label') == true ) {
          $name =  $request->file('label');
          $path = '/uploads/storage/img/posts';
          $file_name = $this->uploadFiles($name, $path);
          $validated['label'] = $file_name;
      }
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
        protected function uploadFiles($name, $path){
      $file_name = $name->getClientOriginalName();
     $type = $name->getClientOriginalExtension();
     if ($type == 'png') $file_type = '.png';
     elseif ($type == 'jpg') $file_type = '.jpg';
     else $file_type = '.jpeg';
     $file_name = md5($file_name) . $file_type;
     $file = $name;
     $file->move(public_path() . $path, $file_name);
     return $file_name;
  }
}
