<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests; // Add this line
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    use AuthorizesRequests; // Add this line

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->paginate(10);

        return view('admin.products.index', [
            'items' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('title')->get();
        return view('admin.products.create', compact('categories'));
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
            'category_id'=> ['required'],
            'photo' => ['required', 'image', 'mimes:jpeg,png,jpg,gif',  'max:2048']
        ]);

        if($request->hasFile('photo')) {
            $photo_path = $request->file('photo')->store('photos', 'public');
        }

        $product = new Product([
            'title' => $request->title,
            'short_content' => $request->short_content,
            'content' => $request->content,
            'photo' => $photo_path,
            'user_id' => Auth::id(),
            'category_id' => $request->category_id
        ]);

        $product->save();

        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.products.show', [
            'item' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $this->authorize('update', $product);

        $categories = Category::orderBy('title')->get();
        return view('admin.products.edit', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $this->authorize('update', $product);

        $data = $request->validate([
            'title'=> ['required', 'string'],
            'short_content'=> ['required', 'string'],
            'content'=> ['required', 'string'],
            'category_id' => ['required'],
            'photo' => ['required', 'image', 'mimes:jpeg,png,jpg,gif',  'max:2048']
        ]);

        if ($request->hasFile('photo')) {
            // Store the new photo and get the path
            $photoPath = $request->file('photo')->store('photos', 'public');

            // Delete the old photo if it exists
            if ($product->photo_path) {
                Storage::disk('public')->delete($product->photo_path);
            }

            // Update the photo_path in the data array
            $data['photo_path'] = $photoPath;
        }

        $product->update($data);

        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $this->authorize('delete', $product);

        $product->delete();

        return redirect()->route('admin.products.index');
    }
}
