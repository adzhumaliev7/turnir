<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Meta;

class MetaController extends Controller
{
    public function index()
    {
      $metas = Meta::all();
   
      return view('admin.home.meta.index', [
        'metas' => $metas,
      ]);
    }
 
    public function edit($id){
        $meta = Meta::find($id);
       return view('admin.home.meta.edit', compact('meta' ));
    }

    public function update($id, Request $request){
        $validated = $request->validate([
            'title' => '',
            'text' => 'required',
          
        ]);
         $meta = Meta::findOrFail($id);
          $meta->update($validated); 
          \Session::flash('flash_meassage', 'Сохранено');
          return redirect()->route('admin.meta.index');   
    }


}
