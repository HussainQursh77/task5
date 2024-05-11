<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategory;
use App\Models\Category;
use App\Models\Parentc;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Middleware\RoleAdndPermission;

use Spatie\Permission\Models\Permission;

class CategoryController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth');
        // $this->middleware('admin')->except('index');
        $this->middleware(['role:admin', 'permission:manage category'])->except('index');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::with('parentc')->get();

        return view('category.index')->with('category', $category);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Parentc::all();
        return view('category.add')->with('category', $category);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategory $request)
    {

        $category = Category::create([
            'name' => $request->name,
            'parentc_id' => $request->parentc_id,
        ]);

        return redirect()->route('category.index')->with('success', 'category added');
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
        $parent = Parentc::all();
        return view('category.edit')->with(compact('category', 'parent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCategory $request, string $id)
    {
        $category = Category::findOrFail($id);
        $category->update([
            $category->name = $request->name,
            $category->parentc_id = $request->parentc_id

        ]);
        return redirect()->route('category.index')->with('success', 'category updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('category.index')->with('success', 'category deleted');

    }
}
