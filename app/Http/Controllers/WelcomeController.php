<?php

namespace App\Http\Controllers;
use App\Category;
use App\Tag;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
  public function index()
  {
    return view('welcome')
        ->with('categories',Category::all())
        ->with('tags',Tag::all())
        ->with('posts',Post::searched()->paginate(2));
  }
}
