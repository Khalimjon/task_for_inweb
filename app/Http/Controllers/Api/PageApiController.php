<?php

namespace App\Http\Controllers\Api;

use Illuminate\Routing\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PageApiController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Page::all();
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

        return response()->json([
            'status' => 'success',
            'data' => $page
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Page $page)
    {
        return response()->json([
            'status' => 'success',
            'data' => $page
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

        return response()->json([
            'status' => 'success',
            'data' => $page
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        $this->authorize('delete', $page);

        $page->delete();

        return response()->json([
            'status' => 'success'
        ]);
    }
}
