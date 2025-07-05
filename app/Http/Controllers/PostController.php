<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function create(){
        return view('Post/create');
    }

  

    public function search(Request $request){
        // Validate the search input
        $request->validate([
            'search' => 'required|string|max:255',
        ]);

        $search = $request->input('search');
        $searchresult = Post::where('title', 'like', '%' . $search . '%')->paginate(6) or
                  Post::where('content', 'like', '%' . $search . '%')->paginate(6);
        return view('index', ['posts' => $searchresult]); 

    }

   public function PCstore(Request $request)
{
    $validate = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Clear any output buffers
    // if (ob_get_contents()) ob_end_clean();

    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $imageName);
    }

    $post = new Post();
    $post->title = $request->title;
    $post->content = $request->content;
    $post->image = $request->hasFile('image') ? $imageName : null;
    $post->save();

    // Force clear buffers again before redirect
    // ob_start();
    return redirect()->route('home')->with('success', 'Post created successfully!');
}




    public function edit($Id){
    $post = Post::findOrFail($Id);
        return view('Post/edit', ['post' => $post]);
    }


    public function update($Id){
         $post = Post::findOrFail($Id);
         $validate = request()->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if (request()->hasFile('image')) {
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $imageName);
            $post->image = $imageName;
        }
        $post->title = request()->title;
        $post->content = request()->content;
        $post->save();
        return redirect()->route('home')->with('success', 'Post updated successfully!');
    }

    public function deleteData($Id){
        $post = Post::findOrFail($Id);
        $post->delete();
        return redirect()->route('home')->with('danger', 'Post deleted successfully!');
    }
    
}
