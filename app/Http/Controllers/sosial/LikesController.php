<?php

namespace App\Http\Controllers\sosial;

use App\Http\Controllers\Controller;
use App\Models\LikesModel;
use App\Models\PostsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
{
    public function like($id)
    {

        $post = PostsModel::find($id);
        $postId = $post->id;

        $data = [
            'post_id' => $postId,
            'user_id' => Auth::user()->id
        ];

        LikesModel::create($data);
        return redirect()->back();

    }
    public function dislike($id)
    {

        $userId = Auth::user()->id;
        $like = LikesModel::where('post_id', $id)
            ->where('user_id', $userId)
            ->first();
        
        $like->delete();

        return redirect()->back();

    }
}
