<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use App\Post;

class PhotoController extends Controller
{
    public function index()
    {
        $photo['photo'] = Photo::all();
        return view('photo.index')->with($photo);
    }
    public function create()
    {
        $photo['post'] = Post::all();
        return view('photo.add')->with($photo);
    }

   
    public function store(Request $request)
    {   
        $request->validate([
            'photo_date' => 'required',
            'photo_text' => 'required',
        ],[
            'photo_date.required' => 'Tanggal harus Diisi',
            'photo_text.required' => 'Keterangan harus Diisi'
        ]);
        $photo = new Photo;
        $photo->post_id = $request->input('post_id');
        $photo->photo_date = $request->input('photo_date');
    	$photo_title = $request->file('photo_title');
    	$photo->photo_title = $photo_title->getClientOriginalName();
    	$photo_title->move(public_path('upload'),$photo_title->getClientOriginalName());
        $photo->photo_text = $request->input('photo_text');

        $photo->save();
        return redirect('photo')->with('status', 'Data Telah Ditambah!');

    }
    public function edit($id)
    {   
        $photo['photo'] = Photo::find($id);
        $photo['post'] = Post::all();
    	return view('photo.edit')->with($photo);
    }
    public function update(Request $request, $id)
    {   
        $request->validate([
            'photo_date' => 'required',
            'photo_title' => 'required',
            'photo_text' => 'required',
        ]);
        $photo = Photo::find($id);
        $photo->post_id = $request->input('post_id');
    	$photo->photo_date = $request->input('photo_date');
    	$photo_title = $request->file('photo_title');
        $photo->photo_title = $photo_title->getClientOriginalName();
        $photo_title->move(public_path('upload'),$photo_title->getClientOriginalName());
        $photo->photo_text = $request->input('photo_text');
        $photo->save();
        return redirect('photo')->with('status', 'Data Telah Diupdate!');
    }

   
    public function destroy($id)
    {
        $photo=Photo::find($id);
        $photo->delete();
        return redirect('photo')->with('status', 'Data Telah Dihapus!');
    }
}
