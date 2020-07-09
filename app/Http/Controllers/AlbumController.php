<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use App\Photo;

class AlbumController extends Controller
{
    public function index()
    {
        $album['album'] = Album::all();
        return view('album.index')->with($album);
    }
    public function create()
    {
        $album['photo'] = Photo::all();
        return view('album.add')->with($album);
    }
    public function store(Request $request)
    {
        $request->validate([
            'album_name' => 'required',
            'album_text' => 'required',
        ],[
            'album_name.required' => 'Nama Album Harus diisi',
            'album_text.required' => 'Keterangan Harus diisi'
        ]);

        $album = new Album;
        $album->photo_id = $request->input('photo_id');
        $album->album_name = $request->input('album_name');
        $album->album_text = $request->input('album_text');
        
        $album->save();
        return redirect('album')->with('status', 'Data Telah Ditambah!');
    }
    public function edit($id)
    {
        $album['album'] = Album::find($id);
    	$album['photo'] = Photo::all();
    	return view('album.edit')->with($album);
    }

   
    public function update(Request $request, $id)
    {
       
        $album = Album::find($id);
        $album->photo_id = $request->input('photo_id');
        $album->album_name = $request->input('album_name');
        $album->album_text = $request->input('album_text');
    	$album->save();
        return redirect('album')->with('status', 'Data Telah Diupdate!');
    }

    
    public function destroy($id)
    {
        $album = Album::find($id);
        $album->delete();
        return redirect('album')->with('status', 'Data Telah Dihapus!');
    }
}
