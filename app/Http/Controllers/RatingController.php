<?php

namespace App\Http\Controllers;

use App\Models\rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function newRating(Request $request)
    {
        $userid = $request->input('user_id');
        $bookid = $request->input('book_id');
        $request->validate([
            'rating' => 'required|integer|between:1,5',
        ]);
        if (Rating::where('user_id', $userid)->where('book_id', $bookid)->exists()) {
            return response()->json(['message' => 'Rating already exists']);
        }

        $rating = new Rating([
            'rating' => $request->rating,
            'user_id' => $userid,
            'book_id' => $bookid,
        ]);
        $rating -> save();

        return response()->json(['message' => 'Rating saved successfully', 'rating' => $rating]);
    }

    public function averageRating()
    {
        $rating = Rating::all();

        if ($rating){
            return response()->json(['data' => $rating], 200);
        } else{
            return response()->json(['message' => 'something went wrong'], 500);
        }
    }
}
