<?php

namespace App\Http\Controllers;

use App\Models\Bookmarks;
use App\Models\News;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    public function store(Request $request, $articleId)
    {
        $user = $request->user(); // Get the authenticated user
        $article = News::findOrFail($articleId);

        // if (!$user->bookmarks->contains($article)) {
        //     $user->bookmarks()->attach($article);
        //     return response()->json(['message' => 'Article bookmarked']);
        // }
        $bookmark = Bookmarks::create([
            'user_id' => $user->id,
            // Assuming $user is the authenticated user
            'article_id' => $article->id,
            // Assuming $article is the news article you want to bookmark
        ]);

        return response()->json(['message' => 'Article is already bookmarked', 'Data' => $bookmark]);
        // $bookmarks = Bookmarks::Save($user,$article->id);
        // return response()->json(['message' => 'sucess', 'data' => $article]);
    }

    public function index(Request $request)
    {
        $user = $request->user();

        $bookmarkedArticles = $user->bookmarks()->with('news')->get();
        // $bookmarkedArticles = $user->bookmarks()->get();
        // $bookmarkedArticles = $bookmarkedArticles->article_id;
        return response()->json($bookmarkedArticles);
    }
}
