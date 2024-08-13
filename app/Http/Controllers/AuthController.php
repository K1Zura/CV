<?php

namespace App\Http\Controllers;

use App\Models\aboutMe;
use App\Models\portofolio;
use App\Models\konfigurasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }
    public function auth(Request $request){
        $request->validate([
            'email'=>['required'],
            'password'=>['required'],
        ]);
        $infoLogin=[
            'email'=>$request->email,
            'password'=>$request->password,
        ];
        if (Auth::attempt($infoLogin)) {
            return redirect('admin');
        }else {
            return redirect('login')->with('error', 'Email atau Password salah');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('login');
    }

    public function admin(){
        $aboutMe = aboutMe::get();
        return view('admin.index', compact('aboutMe'));
    }

    public function index(){
        $konfigurasi = konfigurasi::get();
        $aboutMe = aboutMe::get();
        $portofolio = portofolio::orderBy('id', 'desc')->get();
        return view('index', compact('konfigurasi', 'aboutMe', 'portofolio'));
    }
}
