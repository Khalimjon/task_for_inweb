<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Page::latest()->paginate(10);

        return view('admin.pages.index', [
            'items' => $pages
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=> ['required', 'string'],
            'short_content'=> ['required', 'string'],
            'content'=> ['required', 'string'],
        ]);

        $page = new Page([
            'title' => $request->title,
            'short_content' => $request->short_content,
            'content' => $request->content,
            'user_id' => Auth::id()
        ]);

        $page->save();

        return redirect()->route('admin.pages.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Page $page)
    {
        return view('admin.pages.show', [
            'item' => $page
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page)
    {
        $this->authorize('update', $page);

        return view('admin.pages.edit', [
            'item' => $page
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Page $page)
    {
        $this->authorize('update', $page);

        $data = $request->validate([
            'title'=> ['required', 'string'],
            'short_content'=> ['required', 'string'],
            'content'=> ['required', 'string'],
        ]);

        $page->update($data);

        return redirect()->route('admin.pages.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        $this->authorize('delete', $page);

        $page->delete();

        return redirect()->route('admin.pages.index');
    }
}
