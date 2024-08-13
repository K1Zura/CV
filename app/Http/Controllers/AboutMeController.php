<?php

namespace App\Http\Controllers;

use App\Models\aboutMe;
use Illuminate\Http\Request;

class AboutMeController extends Controller
{
    public function index($id){
        $aboutMe = aboutMe::findOrFail($id);
        $aboutMe = aboutMe::get();
        return view('admin.about-me', compact('aboutMe'));
    }

    public function update(Request $request, $id){
        $aboutMe = aboutMe::findOrFail($id);
        $aboutMe->update($request->all());
        return redirect()->back();
    }
}
