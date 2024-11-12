<?php

namespace App\Http\Controllers\sosial;

use App\Http\Controllers\Controller;
use App\Models\CommentsModel;
use App\Models\LikesModel;
use App\Models\PostsModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class PostsController extends Controller
{ 
    public function index()
    {
        $userId = Auth::user()->id;
        $posts = PostsModel::with('user')
            ->withCount(['likes'])
            ->orderBy('created_at', 'DESC')
            ->get(); // Get all posts with user data


        foreach ($posts as $post) {
            $post->liked = LikesModel::where('post_id', $post->id)
                ->where('user_id', $userId)
                ->exists();
        }

        return view('post.index', compact('posts'));
    } 
    public function create()
    {
        return view('post.create');
    }
    public function store(Request $request)
    {

        if ($request->has('post_image')) {

            $images = $request->file('post_image');
            $imagePath = $images->store('uploads', 'public');

            PostsModel::create([
                'user_id' => Auth::user()->id,
                'message' => $request->message,
                'post_image' => $imagePath,
            ]);

            return redirect()->route('post.index')->with('success', 'berhasil terposting');
        }

        PostsModel::create([
            'user_id' => Auth::user()->id,
            'message' => $request->message,
            'post_image' => '-',
        ]);

        return redirect()->route('post.index')->with('success', 'berhasil terposting');

    }
    public function show($id)
    {
        $post = PostsModel::with('likes', 'user')->find($id);
        $comments = CommentsModel::with('user')
            ->where('post_id', '=', $post->id)
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('post.show', compact('post', 'comments'));
    }

    public function profile($id)
    {
        $user = User::find($id);
        $userId = Auth::user()->id;
        $posts = PostsModel::with('user')
            ->where('user_id', '=', Auth::user()->id)
            ->withCount(['likes'])
            ->orderBy('created_at', 'DESC')
            ->get(); // Get all posts with user data


        foreach ($posts as $post) {
            $post->liked = LikesModel::where('post_id', $post->id)
                ->where('user_id', $userId)
                ->exists();
        }

        return view('post.profile', compact('user', 'posts'));

    }

   public function delete($id)
    {
        
        $posts = PostsModel::findOrFail($id);
        $posts->delete();

        return redirect()->back();

    }
}
