<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{

    use respons;
    public function addbook(Request $request)
    {
        $bookid = $request->book_id;
        $user = Auth::user();
        if (!($user->wishlist()->where('book_id', $bookid)->exists())) {
            $user->wishlist()->attach($bookid);
            return $this->res('book added to wishlist', 201);
        }
        return $this->res('book is already in your wishlist', 400);


    }
}
