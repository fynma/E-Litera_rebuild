<?php

namespace App\Http\Controllers;

use App\Models\comment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\validator;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{

    public function uploadComment(Request $request)
    {
        $userid = $request->input('user_id');
        $bookid = $request->input('book_id');
        $validation = $request->validate([
            'komentar' => 'required|max:255',
        ]);

        $datecomment = Carbon::now();

        $comment = new Comment([
            'komentar' => $validation['komentar'],
        ]);
        $comment->user_id = $userid;
        $comment->book_id = $bookid;
        $comment->tgl_komentar = $datecomment;
        $comment->save();

        if ($comment) {
            return response()->json(['data' => $comment], 200);
        } else {
            return response()->json(['message' => 'komentar gagal ditambahkan'], 500);
        }
    }

    public function getComment()
    {
        $comment = Comment::all();
        return response()->json(['data' => $comment], 200);
    }

    // public function deleteComment(Request $request)
    // {
    //     $user_id = $request->input('user_id');
    //     $id = $request->input('comment_id');

    //     $role = auth()->user()->access;

    //     if (!$user_id || $role == "administrator") {
    //         return response()->json(['message' => 'tidak bisa menghapus komentar'], 500);
    //     } else {
    //         $comment = Comment::find($id);
    //         $comment->delete();
    //         if ($comment) {
    //             return response()->json(['message' => 'komentar berhasil dihapus'], 200);
    //         } else {
    //             return response()->json(['message' => 'komentar gagal dihapus'], 500);
    //         }
    //     }
    // }
    public function deleteComment(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer',
            'comment_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Invalid input'], 400);
        }

        $user_id = $request->input('user_id');
        $comment_id = $request->input('comment_id');

        $comment = Comment::find($comment_id);

        if (!$comment) {
            return response()->json(['message' => 'Komentar tidak ditemukan'], 404);
        }
        $user = DB::table('users')->where('user_id', $user_id)->first();
        $role = $user->access;

        if ($user_id != $comment->user_id && $role != "administrator") {
            return response()->json(['message' => 'Anda tidak memiliki izin untuk menghapus komentar'], 403);
        }

        $comment->delete();

        if ($comment) {
            return response()->json(['message' => 'Komentar berhasil dihapus'], 200);
        } else {
            return response()->json(['message' => 'Gagal menghapus komentar'], 500);
        }
    }

}
