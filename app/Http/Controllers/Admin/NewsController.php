<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // We receive all news from the database
        $news = News::latest()->paginate(10);

        //Passing data to a Vue component via Inertia
        return inertia('Admin/News/Index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Send to the news creation form
        return inertia('Admin/News/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Input data validation
        $validated = $request->validate([
            'title' => 'required|max:100',
            'short_description' => 'required|max:255',
            'text' => 'required',
        ]);

        // Create new news
        News::create($validated);

        // Redirect to list with success message
        return redirect()->route('admin.news.index')->with('success', 'News successfully created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        return inertia('Admin/News/Show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        return inertia('Admin/News/Edit', ['news' => $news,]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'title' => 'required|max:100',
            'short_description' => 'required|max:255',
            'text' => 'required',
        ]);
        $news->update($validated);

        return redirect()->route('admin.news.index')->with('success', 'The news has been successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('admin.news.index')->with('success', 'The news has been successfully deleted!');
    }
}
