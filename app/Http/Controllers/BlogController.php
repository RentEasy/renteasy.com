<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $articles = Article::orderByDesc('updated_at')
            ->where('online', true)
            ->get();

        return view('blog.index', ['articles' => $articles]);
    }

    public function show(Article $article)
    {
        return view('blog.show', ['article' => $article]);
    }
}
