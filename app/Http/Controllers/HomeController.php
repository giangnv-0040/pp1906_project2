<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        //note: only show posts of this user and friends.
        $userIds = User::pluck('id');
        $loadMoreFlag = (isset($request->page) && $request->page > 1);
        $page = $loadMoreFlag ? $request->page : 1;

        $posts = Post::with('user')->whereIn('user_id', $userIds)->orderBy('created_at', 'desc')
            ->paginate(3, ['*'], 'page', $page);

        if ($loadMoreFlag) {
            return view('pages.blocks.post', compact('posts'));
        }

        return view('pages.newsfeed.index', compact('posts'));
    }
}
