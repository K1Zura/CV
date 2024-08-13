<?php

namespace App\Http\Controllers;

use App\Models\aboutMe;
use App\Models\portofolio;
use Illuminate\Http\Request;

class PortofolioController extends Controller
{
    public function index(){
        $aboutMe = aboutMe::get();
        $portofolio = portofolio::orderBy('id', 'desc')->get();
        return view('admin.portofolio', compact('aboutMe', 'portofolio'));
    }

    public function add(Request $request){
        $newName = '';
            if($request->file('foto_portofolio')){
            $extension = $request->file('foto_portofolio')->getClientOriginalExtension();
            $newName = $request->kategori.'-'.now()->timestamp.'.'.$extension;
            $request->file('foto_portofolio')->storeAs('portofolio', $newName);
        }
        $request['foto'] = $newName;

        $portofolio = portofolio::create($request->all());
        return redirect()->back()->with('success', 'Portofolio Berhasil Ditambah');
    }

    public function delete($id){
        $portofolio = portofolio::findOrFail($id);
        $file = storage_path('app/public/portofolio/') . $portofolio->foto;
        if (file_exists($file)) {
            unlink($file);
        }
        $portofolio->delete();
        return redirect()->back()->with('success', 'Portofolio Berhasil Dihapus');

    }
}
