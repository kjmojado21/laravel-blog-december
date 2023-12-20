<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //
    private $post;
    public function __construct(Post $post)
    {

        $this->post = $post;
    }

    public function index(){

        $all_posts = $this->post->latest()->get();
        return view('post.index')
                    ->with('all_posts',$all_posts);
    }
    public function create(){

        return view('post.create');
    }

    public function store(Request $request){
        $this->post->title = $request->title;
        $this->post->description =  $request->description;
        $this->post->image = $this->saveImage($request);
        $this->post->user_id = Auth::user()->id;
        $this->post->save();

        return redirect()->route('index');
    }
    public function saveImage($request){
        #renames the image file
        $image_name = time().".".$request->image->extension();
        #1703076562.jpeg
        $request->image->storeAs('public/images/',$image_name);
        #public/images/1703076562.jpeg

        return $image_name;
    }
}
