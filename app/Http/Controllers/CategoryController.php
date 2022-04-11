<?php

namespace App\Http\Controllers;

use App\Components\Recusive;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    public function getCategory($parentID)
    {
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->CategoryRecusive($parentID);
        return $htmlOption;
    }
    public function create()
    {
        $htmlOption = $this->getCategory('');
        return view('admin.category.addCategory', compact('htmlOption'));
    }
    public function index()
    {
        $categories = $this->category->latest()->paginate(5);
        return view('admin.category.indexCategory', compact('categories'));
    }
    public function store(Request $request)
    {
        $this->category->create([
            "name" => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name)
        ]);
        return redirect(route('categories.create'));
    }
    public function edit($id)
    {
        $category = $this->category->find($id);
        $htmlOption = $this->getCategory($category->parent_id);
        return view('admin.category.editCategory', compact('category', 'htmlOption'));
    }
    public function update($id, Request $request)
    {
        $this->category->find($id)->update([
            "name" => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::of($request->name)
        ]);
        return redirect(route('categories.index'));
    }
    public function del($id)
    {
        $this->category->find($id)->delete();
        return redirect(route('categories.index'));
    }
}
