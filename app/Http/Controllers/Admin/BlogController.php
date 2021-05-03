<?php

namespace App\Http\Controllers\Admin;

use App\GlobalPost;
use App\Http\Controllers\Controller;
use App\PostType;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    public function addblog($slug){
        $postType = PostType::where('slug',$slug)->first();
        return view('Blog.addblog',compact('postType'));
    }


    public function blogsubmit(Request $request,$slug){
        $postType = PostType::where('slug',$slug)->first();

        if($request->hasFile('image')){
            $requestedimage = $request->image;
            $imagename = time().$requestedimage->GetClientOriginalName();
            $path = public_path('images');
            $requestedimage->move($path,$imagename);
            $image = 'images/'.$imagename;
        }
        $user = Auth::user();
        GlobalPost::create([
            'title' => $request->title,
            'slug' => SlugService::createSlug(GlobalPost::class, 'slug', $request->title),
            'status' => $request->status,
            'image' => $image,
            'post_type' => $postType->id,
            'post_content' => $request->description,
            'post_author' => $user->id

        ]);
        return redirect()->back()->with('success','Blog created!!!');
    }


    public function allblogs($slug){
        $postType = PostType::where('slug',$slug)->first();
        $globalpost = GlobalPost::where('post_type',$postType->id)->get();
        return view('Blog.allblogs',compact('globalpost','postType'));

    }


    public function editblog($pslug,$gslug){
        $postType = PostType::where('slug',$pslug)->first();
        $globalpost = GlobalPost::where('slug',$gslug)->first();
        return view('Blog.editblog',compact('globalpost','postType'));
    }

    public function editpostsubmit(Request $request,$slug){

        $globalpost = GlobalPost::where('slug',$slug)->first();

        $image_path = public_path($globalpost->image);
        if($request->hasFile('image')){
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
            $requestedimage = $request->image;
            $imagename = time().$requestedimage->GetClientOriginalName();
            $path = public_path('images');
            $requestedimage->move($path,$imagename);
            $image = 'images/'.$imagename;
            $globalpost->image = $image;

        }
        $globalpost->title = $request->title;
        $globalpost->post_content = $request->description;
        $globalpost->status = $request->status;
        $globalpost->update();
        return redirect()->back()->with('success','updated successfully');



    }

    public function deletepost(Request $request,$pslug,$gslug){
        $globalpost = GlobalPost::where('slug',$gslug)->first();
        $image_path = public_path($globalpost->image);
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $globalpost->delete();
        return redirect()->back()->with('success','Deleted succesfully');

    }
}
