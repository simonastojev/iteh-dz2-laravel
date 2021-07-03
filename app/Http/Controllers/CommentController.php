<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Article;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index() {
        return Comment::all();
    }

    public function indexJoin($article_id) {
        return DB::table('comments')
            ->join('articles', 'comments.article_id', '=', 'articles.id')
            ->select('comments.*')
            ->where('articles.id','=',$article_id)
            ->get();
    }

    public function show(Comment $comment) {
        return $comment;
    }

    public function store(Request $req) {
        $comment = Comment::create($req->all());

        response()->json($comment, 201);
        return redirect()->back();
    }

    public function update(Request $req, Comment $comment) {
        $comment->update($req->all());

        return response()->json($comment, 200);
    }

    public function delete(Comment $comment)
    {
        $comment->delete();
        return response()->json(null, 204);
    }
}
