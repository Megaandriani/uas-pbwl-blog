<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('category.index',compact('category'));
    }

    public function create()
    {
        return view('category.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|min:2',
            'category_text' => 'required',
        ],[
            'category_name.required' => 'Nama Kategori Harus diisi',
            'category_text.required' => 'Keterangan Harus diisi'
        ]);
        $category = new Category([
            'category_name'=>$request->input('category_name'),
            'category_text'=>$request->input('category_text')
        ]);
        $category->save();
        return redirect('category')->with('status', 'Data Telah Ditambah');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('category/edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required|min:2',
            'category_text' => 'required',
        ]);
        $category=Category::find($id);
        $category->category_name=$request->input('category_name');
        $category->category_text=$request->input('category_text');
        $category->save();
        return redirect('category')->with('status', 'Data Telah Diupdate');
    }

    public function destroy($id)
    {
        $category=Category::find($id);
        $category->delete();
        return redirect('category')->with('status', 'Data Telah Dihapus');
    }
}
