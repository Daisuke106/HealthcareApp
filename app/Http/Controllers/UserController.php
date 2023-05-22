<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Post;

class UserController extends Controller
{
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
        return view('posts/edit')->with(['post' => $post]);
    }
    
        public function index(Post $post)
    {
        return view('users/index')->with(['posts' => $post->getPaginateByLimit()]);
    }

    public function show(Post $post)
{
    return view('users/show')->with(['post' => $post]);
    
}
    //
}
