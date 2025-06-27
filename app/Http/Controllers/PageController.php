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

    public function test2()
    {
        return view('test', ['massage' => 'Test SM 2']);
    }
}
