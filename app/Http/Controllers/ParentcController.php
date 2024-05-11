<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePCategory;
use App\Models\Parentc;
use Illuminate\Http\Request;
use League\Flysystem\UrlGeneration\PublicUrlGenerator;
use Spatie\Permission\Models\Role;
use App\Http\Middleware\RoleAdndPermission;

use Spatie\Permission\Models\Permission;

class ParentcController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
        // $this->middleware('admin')->except('index');
        $this->middleware(['role:admin', 'permission:manage parent category'])->except('index');
    }
    public function index()
    {
        $role = Role::all();

        $parent = Parentc::all();
        return view('parentcategory.index')->with('parent', $parent);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permission = Permission::get();
        return view('parentcategory.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePCategory $request)
    {
        // dd($request);
        $parent = Parentc::create([
            'name' => $request->name,
        ]);

        return redirect()->route('parent.index')->with('success', 'category added');
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
        $parent = Parentc::findOrFail($id);
        return view('parentcategory.edit')->with('parent', $parent);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePCategory $request, string $id)
    {
        $parent = Parentc::findOrFail($id);
        $parent->update([
            $parent->name = $request->name,

        ]);
        return redirect()->route('parent.index')->with('success', 'category updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $parent = Parentc::findOrFail($id);
        $parent->delete();
        return redirect()->route('parent.index')->with('success', 'category deleted');
    }
}
