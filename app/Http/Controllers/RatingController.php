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
    
        $existingRating = Rating::where('user_id', $userid)->where('book_id', $bookid)->first();
    
        if ($existingRating) {
            $existingRating->update([
                'rating' => $request->rating,
            ]);
    
            return response()->json(['message' => 'Rating updated successfully', 'rating' => $existingRating]);
        }
        $rating = new Rating([
            'rating' => $request->rating,
            'user_id' => $userid,
            'book_id' => $bookid,
        ]);
    
        $rating->save();
    
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
