<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\PageRequest;
use App\Models\Pages;
use App\CustomClasses\ColectionPaginate;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class PagesController extends Controller
{
    public function index()
    {
      $pages = Pages::getAll();
   
      return view('admin.home.pages.index', [
        'pages' => $pages,
      ]);
    }
    public function create()
    {
      return view('admin.home.pages.create');
    }
    public function store(PageRequest $request)
    {
      $data = $validated = $request->validated();
      Pages::create(['page'=> $request->input('page'),'title'=> $request->input('title'), 'user_id'=> Auth::user()->id,'text' => $request->input('text') ]);
      return redirect()->route('admin.pages');
    }
    public function edit($id){
        $page = Pages::find($id);
  
        $page_id = $id;
       return view('admin.home.pages.edit', compact('page' ,'page_id'));
    }

    public function update($id, Request $request){
        $validated = $request->validate([
            'title' => 'required',
            'text' => 'required',
            'date' => '',
        ]);
         $product = Pages::findOrFail($id);
          $product->update($validated); 
          \Session::flash('flash_meassage', 'Сохранено');
          return redirect()->route('admin.pages');   
    }

    public function destroy($id){
      $post = Pages::findOrFail($id);
      $post->delete(); 
      \Session::flash('flash_meassage', 'Запись удалена');
      return redirect()->route('admin.pages'); 
  }
  

}


