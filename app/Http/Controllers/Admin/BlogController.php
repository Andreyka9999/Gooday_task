<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::latest()->paginate(10);

        // Получаем текущего пользователя и его права
        $user = auth()->user();

        return inertia('Admin/Blog/Index', [
            'blogs' => $blogs,
            'can' => [
                'create' => $user ? $user->can('blog.manage') : false,
                'edit' => $user ? $user->can('blog.manage') : false,
                'delete' => $user ? $user->can('blog.manage') : false,
            ],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Проверяем права перед показом формы
        $this->authorize('create', Blog::class);

        return inertia('Admin/Blog/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Blog::class);

        $validated = $request->validate([
            'title' => 'required|max:100',
            'short_description' => 'required|max:255',
            'text' => 'required',
        ]);

        Blog::create($validated);

        return redirect()->route('admin.blog.index')->with('success', 'The entry was created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return inertia('Admin/Blog/Show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $this->authorize('update', $blog);

        return inertia('Admin/Blog/Edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $this->authorize('update', $blog);

        $validated = $request->validate([
            'title' => 'required|max:100',
            'short_description' => 'required|max:255',
            'text' => 'required',
        ]);
        $blog->update($validated);

        return redirect()->route('admin.blog.index')->with('success', 'The entry has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $this->authorize('delete', $blog);

        $blog->delete();
        return redirect()->route('admin.blog.index')->with('success', 'The entry has been successfully deleted!');
    }
}
