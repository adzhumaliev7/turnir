<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\PostRequest;

use App\Models\Help;
use App\CustomClasses\ColectionPaginate;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class HelpController extends Controller
{
    public function index()
    {
  
      $posts = Help::getAll();
      if($posts !=null) $posts = ColectionPaginate::paginate($posts, 15);
  
      return view('admin.home.help.help', [
        'posts' => $posts,
      ]);
    }
    public function create()
    {
      return view('admin.home.help.create_help');
    }
    public function store(PostRequest $request)
    {
      $data = $validated = $request->validated();
      Help::create(['title'=> $request->input('title'), 'user_id'=> Auth::user()->id,'text' => $request->input('text') ,'created_at'=>  $request->input('date')]);
      return redirect()->route('admin.help');
    }

    public function edit($id){
        $posts = Help::findOrFail($id);
        $post_id = $id;
        return view('admin.home.help.edit_help', compact('posts' ,'post_id'));
    }
    public function update($id, Request $request){
        $validated = $request->validate([
            'title' => 'required',
            'text' => 'required',
            'date' => '',
        ]);
         $product = Help::findOrFail($id);
          $product->update($validated); 
          \Session::flash('flash_meassage', 'Сохранено');
          return redirect()->route('admin.help');   
    }
    public function destroy($id){
        $post = Help::findOrFail($id);
        $post->delete(); 
        \Session::flash('flash_meassage', 'Запись удалена');
        return redirect()->route('admin.help'); 
    }
}
