<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\PostType;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cviebrock\EloquentSluggable\Services\SlugService;

class AdminController extends Controller
{
    public function login(){
        return view('Admin.login');
    }


    public function createadmin(){
        User::create([
            'firstname' => 'admin',
            'lastname' => 'admin',
            'email' =>'admin@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('12345678')
        ]);
        return redirect()->route('home');
    }


    public function adminloginsubmit(Request $request){
        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)){
           $authuser = Auth::user();
           if($authuser->role == 'admin'){
               return redirect()->route('admindashboard');
            }
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }



    public function admindashboard(){
        return view('Admin.adminDashboard');
    }



    public function createposttype(){
        return view('PostType.createPosttype');
    }


    public function posttypesubmit(Request $request){
        PostType::create([
            'slug' =>  SlugService::createSlug(PostType::class, 'slug', $request->title),
            'title' => $request->title,
            'description' => $request->description,
            'has_archive' => $request->archive?1:0,
            'feature_image' => $request->feature_image?1:0,
            'position' => $request->position,
            'editor' => $request->editor?1:0,
            'icon' => $request->icon,

        ]);
        return redirect()->back()->with('success','posttype added successfully');
    }


    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
