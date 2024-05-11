<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBook;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Book;
use Spatie\Permission\Models\Role;
use App\Http\Middleware\RoleAdndPermission;

use Spatie\Permission\Models\Permission;

class BookController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth');
        // $this->middleware('admin')->except('index');
        $this->middleware(['role:admin', 'permission:manage library'])->except('index');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $books = Book::with('category')->get();
        return view('book.index')->with('books', $books);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view('book.add')->with('category', $category);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBook $request)
    {
        // dd($request);
        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'price' => $request->price,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('book.index')->with('success', 'book added');
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
        $book = Book::findOrFail($id);
        $category = Category::all();
        return view('book.edit')->with(compact('book', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreBook $request, string $id)
    {
        // dd($request);
        $book = Book::findOrFail($id);
        $book->update([
            $book->title = $request->title,
            $book->author = $request->author,
            $book->price = $request->price,
            $book->category_id = $request->category_id,
        ]);
        return redirect()->route('book.index')->with('success', 'book updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect()->route('book.index')->with('success', 'book has been deleted successfully');

    }
}