<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\HelpRequest;
use Illuminate\Support\Facades\DB;
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
    public function store(HelpRequest $request)
    {
      $last = Help::latest()->first();
     
       $data = $validated = $request->validated();
      Help::create(['title'=> $request->input('title'), 'user_id'=> Auth::user()->id,'text' => $request->input('text'), 'post_id' => $last->post_id+1,'created_at'=>  $request->input('date')]);
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

    public function filter()
    {
      $posts = Help::all();
      return view('admin.home.help.filter', compact('posts'));
    }
    public function filter_store(Request $request)
    {
      foreach ($request->input('data') as $id => $row) {
        \DB::table('help')->where('id', $id)->update($row);
    }
     return redirect()->route('admin.help'); 
    }
    public function destroy($id){
        $post = Help::findOrFail($id);
        $post->delete(); 
        \Session::flash('flash_meassage', 'Запись удалена');
        return redirect()->route('admin.help'); 
    }
}
