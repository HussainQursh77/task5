<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResourc;
use App\Models\Book;
use App\Models\Category;
use App\Models\Parentc;
use Database\Seeders\CategorySeeder;
use Illuminate\Http\Request;

class VisitorResponse extends Controller
{
    use respons;
    public function index()
    {
        $books = BookResourc::collection(Book::all());
        return $this->traitresponses($books, 200, 'all book');
    }

    public function filter(Request $request)
    {

        $categoryname = $request->input('category_name');
        $parentcategoryname = $request->input('parentc_name');
        $query = Book::query();
        if ($categoryname) {
            $query->whereHas('category', function ($query) use ($categoryname) {
                $query->where('name', $categoryname);
            });
        }

        if ($parentcategoryname) {
            $query->whereHas('category.parentc', function ($query) use ($parentcategoryname) {
                $query->where('name', $parentcategoryname);
            });
        }
        $book = $query->get();
        return $this->traitresponses(BookResourc::collection($book), 200, 'book filter');

    }
}
