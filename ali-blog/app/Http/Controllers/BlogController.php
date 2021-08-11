<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
Use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
            $blog = Blog::latest()->paginate(10);


            return view('blog.index', compact('blog'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    
    public function create()
    {
        // Menampilkan halaman create
        return view('blog.create');
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'image'     => 'required|image|mimes:png,jpg,jpeg',
            'title'     => 'required',
            'kontent'   => 'required'
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/blogs', $image->hashName());

        $blog = Blog::create([
            'image'     => $image->hashName(),
            'title'     => $request->title,
            'content'   => $request->kontent
        ]);

        if($blog){
            //redirect dengan pesan sukses
            return redirect()->route('blog.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('blog.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    
    public function show(Blog $blog)
    {
        return view('blog.show',compact('blog'));
    }

    
    public function edit(Blog $blog)
    {
        return view('blog.edit', compact('blog'));
    }

    
    public function update(Request $request, Blog $blog)
    {
        $this->validate($request, [
            'title'     => 'required',
            'kontent'   => 'required'
        ]);
    
        //get data Blog by ID
        $blog = Blog::findOrFail($blog->id);
    
        if($request->file('image') == "") {
    
            $blog->update([
                'title'     => $request->title,
                'content'   => $request->kontent
            ]);
    
        } else {
    
            //hapus old image
            Storage::disk('local')->delete('public/blogs/'.$blog->image);
    
            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/blogs', $image->hashName());
    
            $blog->update([
                'image'     => $image->hashName(),
                'title'     => $request->title,
                'content'   => $request->kontent
            ]);
    
        }
    
        if($blog){
            //redirect dengan pesan sukses
            return redirect()->route('blog.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('blog.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    
    public function destroy($id)
    {
        // Mencari data berdasarkan ID
        $blog = Blog::findOrFail($id);
        $blog->delete();

        if($blog){
            //redirect dengan pesan sukses
            return redirect()->route('blog.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('blog.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }


    public function search(Request $request)
    {
        $keyword = $request->search;
        $blog = Blog::where('title', 'like', "%" . $keyword . "%")->paginate(5);
        return view('blog.index', compact('blog'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

}
