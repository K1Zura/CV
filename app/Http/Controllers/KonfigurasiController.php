<?php

namespace App\Http\Controllers;

use App\Models\aboutMe;
use App\Models\konfigurasi;
use Illuminate\Http\Request;

class KonfigurasiController extends Controller
{
    public function index(){
        $konfigurasi = konfigurasi::get();
        $aboutMe = aboutMe::get();
        return view('admin.konfigurasi', compact('konfigurasi', 'aboutMe'));
    }

    public function add(Request $request){
        $newNames = [];

		if($request->file('background_photo')){
            $extension = $request->file('background_photo')->getClientOriginalExtension();
            $newName = 'background-'.now()->timestamp.'.'.$extension;
            $request->file('background_photo')->storeAs('foto', $newName);
            $newNames['background'] = $newName;
        }

		if($request->file('profil_photo')){
            $extension = $request->file('profil_photo')->getClientOriginalExtension();
            $newName = 'profil-'.now()->timestamp.'.'.$extension;
            $request->file('profil_photo')->storeAs('foto', $newName);
            $newNames['profil'] = $newName;

        }

        $request->merge($newNames);

        $konfigurasi = konfigurasi::create($request->all());
        return redirect('konfigurasi');
    }

    public function update(Request $request, $id){
        $konfigurasi = konfigurasi::findOrFail($id);

        $konfigurasi->facebook = $request->input('facebook');
        $konfigurasi->instagram = $request->input('instagram');
        $konfigurasi->linkedln = $request->input('linkedln');

        if ($request->hasFile('background_photo')){
            $file = storage_path('/app/public/foto/') .$konfigurasi->background;
            if (file_exists($file)) {
                @unlink($file);
            }
            Storage::disk('public_html')->delete('foto/' . $konfigurasi->background);
            $file = $request->file('background_photo');
            $extension = $request->file('background_photo')->getClientOriginalExtension();
            $newName = 'background-'.'-'.now()->timestamp.'.'.$extension;
            $request->file('background_photo')->storeAs('foto', $newName);
            $konfigurasi->background = $newName;
        }

        if ($request->hasFile('profil_photo')){
            $file = storage_path('/app/public/foto/') .$konfigurasi->profil;
            if (file_exists($file)) {
                @unlink($file);
            }
            $file = $request->file('profil_photo');
            $extension = $request->file('profil_photo')->getClientOriginalExtension();
            $newName = 'profil-'.'-'.now()->timestamp.'.'.$extension;
            $request->file('profil_photo')->storeAs('foto', $newName);
            $konfigurasi->profil = $newName;
        }

        $konfigurasi->update();
        return redirect('konfigurasi');
    }
}
