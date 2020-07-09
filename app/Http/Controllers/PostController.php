<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PostController extends Controller
{
    public function index()
    {  
        $post['post'] = Post::all();
        return view('post.index')->with($post);
    }
    public function create()
    {
        $post['category'] = Category::all();
        return view('post.add')->with($post);      
    }
    public function store(Request $request)
    {   
        $request->validate([
            'post_date' => 'required',
            'post_slug' => 'required',
            'post_title' => 'required',
            'post_text' => 'required',
        ],[
            'post_date.required' => 'Tanggal Harus diisi',
            'post_slug.required' => 'Slug Harus diisi',
            'post_title.required' => 'Judul Post Harus diisi',
            'post_text.required' => 'Keterangan Harus diisig'
        ]);
        $post = new Post;
        $post->category_id = $request->input('category_id');
        $post->post_date = $request->input('post_date');
    	$post->post_slug = $request->input('post_slug');
        $post->post_title = $request->input('post_title');
        $post->post_text = $request->input('post_text');
        
        $post->save();
        return redirect('post')->with('status', 'Data Telah Ditambah!');
        
    }
    public function edit($id)
    {
        $post['post'] = Post::find($id);
    	$post['category'] = Category::all();
    	return view('post.edit')->with($post);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'post_date' => 'required',
            'post_slug' => 'required',
            'post_title' => 'required',
            'post_text' => 'required',
        ]);
        $post = Post::find($id);
        $post->category_id = $request->input('category_id');
    	$post->post_date = $request->input('post_date');
        $post->post_slug = $request->input('post_slug');
        $post->post_title = $request->input('post_title');
        $post->post_text = $request->input('post_text');
    	$post->save();
        return redirect('post')->with('status', 'Data Telah Diupdate!');
     
    }

   
    public function destroy($id)
    {
        $post=Post::find($id);
        $post->delete();
        return redirect('post')->with('status', 'Data Telah Dihapus!');
    }
}
