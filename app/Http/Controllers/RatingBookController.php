<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class RatingBookController extends Controller
{
    use respons;
    public function ratebook(Request $request)
    {

        $book_id = $request->input('book_id');
        $user_id = $request->input('user_id');
        $rate = $request->input('rating');
        $user = Auth::user();
        $request->validate([
            'review' => 'string|max:255',
        ]);

        if ($rate < 0 && $rate >= 5) {
            return $this->res('Rating should be between 1 and 5.', 400);
        }
        $book = Book::all();

        if (!$book) {
            return $this->res('Book not found.', 404);
        }


        auth()->user()->rates()->attach($request->book_id, ['rating' => $request->rating]);
        auth()->user()->rates()->attach($request->book_id, ['review' => $request->review]);

        // $user_id = $user->rates()->where('book_id', $book_id);

        // Rate::create([
        //     'book_id' => $book_id,
        //     'user_id' => $user_id,
        //     'rating' => $rate,
        // ]);

        return $this->res('Book rated successfully.', 200);
    }
}
