<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Rules\Filter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $request = request();

        $categories = Category::leftJoin('categories as parents', 'parents.id', '=', 'categories.parent_id')
            ->select('categories.*', 'parents.name as parents_name')
            ->orderBy('categories.name')
            ->filter($request->query())->paginate();
        return view('dashboard.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parents = Category::all();
        return view('dashboard.categories.create', compact('parents'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|min:3|max:255',
                'parent_id' => 'nullable|int|exists:categories,id',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'status' => 'required|in:active,archived',
            ]
        );
        $request->merge([
            'slug' => str($request->name)->slug(),
        ]);
        $data = $request->except('image');
        $data['image'] = $this->uploadImage($request);
        $categories = Category::create($data);
        return redirect()->route('dashboard.categories.index')->with('success', 'Category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        $parents = Category::where('id', '<>', $id)
            ->where(function ($query) use ($id) {
                $query->whereNull('parent_id')
                    ->orWhere('parent_id', '<>', $id);
            }) // Exclude the current editing category
            ->get();
        return view('dashboard.categories.edit', compact('category', 'parents'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'name' => [
                    'required',
                    'min:3',
                    'max:255',
                    'unique:categories,name,' . $id,
                    new Filter([
                        'admin',
                        'administrator',
                        'root',
                        'superuser',
                        'superadmin',
                        'laravel',
                        'php'
                    ]),
                ],
                'parent_id' => 'nullable|int|exists:categories,id',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'status' => 'required|in:active,archived',
            ]
        );

        $category = Category::findOrFail($id);
        $old_image = $category->image;
        $data = $request->except('image');
        $new_image = $this->uploadImage($request);
        if ($new_image) {
            $data['image'] = $new_image;
        }
        $category->update($data);
        if ($old_image && isset($new_image)) {
            Storage::disk('public')->delete($old_image);
        }
        return redirect()->route('dashboard.categories.index')->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }

        return redirect()->route('dashboard.categories.index')->with('success', 'Category deleted successfully');
    }

    protected function uploadImage(Request $request)
    {
        if (!$request->hasFile('image')) {
            return;
        }
        $file = $request->file('image');
        $path = $file->store('uploads', 'public');
        return $path;
    }
}
