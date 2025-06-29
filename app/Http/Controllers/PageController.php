<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; // Import the Post model if needed

class PageController extends Controller
{

    public function index()
    {
        return view('welcome');
    }

    public function create()
    {
        return 'Test SM';
    }

      public function test(){
        Post::create(['title' => 'SM ', 'content' => 'No way','image'=>'null.jpg']);
        $posts = Post::all();


        return view('test',['massage' => 'Test SM 2', 'posts' => $posts]);
    }
}
