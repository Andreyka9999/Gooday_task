<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\News;
use Inertia\Inertia;

class LandingController extends Controller
{
    public function index()
    {
        return Inertia::render('Landing', [
            'blogs' => Blog::latest()->get(),
            'news' => News::latest()->get(),
        ]);
    }

    public function blogs()
    {
        return Inertia::render('Blog/Index', [
            'blogs' => Blog::latest()->get(),
        ]);
    }

    public function news()
    {
        return Inertia::render('News/Index', [
            'news' => News::latest()->get(),
        ]);
    }

    public function showBlog(Blog $blog)
    {
        return Inertia::render('Blog/Show', ['item' => $blog]);
    }

    public function showNews(News $news)
    {
        return Inertia::render('News/Show', ['item' => $news]);
    }
}

