<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Article;
use App\Models\Comment;
class ArticleController extends Controller
{
    //
    public function index() {
        return Article::all();
    }

    public function indexJoin() {
        return DB::table('articles')
            ->join('comments', 'articles.id', '=', 'comments.article_id')
            ->select('articles.*', 'comments.*')
            ->get();
    }

    public function show(Article $article) {
        return $article;
    }

    public function store(Request $req) {
        $article = Article::create($req->all());

        //return response()->json($article, 201);
        return redirect('home');
    }

    public function update(Request $req, Article $article) {
        $article->update($req->all());

        //return response()->json($article, 200);
        return redirect('home');
    }

    public function delete(Article $article)
    {
        $article->delete();
        //return response()->json(null, 204);
        return redirect('home');
    }
}
