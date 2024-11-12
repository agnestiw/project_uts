<?php

namespace App\Http\Controllers\sosial;

use App\Http\Controllers\Controller;
use App\Models\CommentsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function newComments(Request $request, $id){

        CommentsModel::create([
            'user_id' => Auth::user()->id,
            'post_id' => $id,
            'comment' => $request->comment,
            'comment_image' => '-',
        ]);

        return redirect()->back();

    }
}
