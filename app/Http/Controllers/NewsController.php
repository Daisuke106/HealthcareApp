<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\News;

class NewsController extends Controller
{
    public function index(Post $News)
    {
        return view('news/index')->with(['posts' => $post->getPaginateByLimit()]);
    }
}