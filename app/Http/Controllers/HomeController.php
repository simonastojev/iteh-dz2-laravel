<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use ReflectionClass;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('web');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

      $article = ['article' => (object)[
        'title' =>'no_title',
        'created_at' =>'no_date',
        'comments_no' =>'0'
      ]];

      $article = (object) $article;

     $request = Request::create(route('getArticlesAndComments'), 'GET');

      $response = app()->handle($request);
     // echo $response;
      $articles = $this->toObject($response);

      $nizIDjeva;
      $i = 0;

      foreach($articles as $article) {
        $broj = $article->article_id;
        $nizIDjeva[$i++] = $broj;
      }
      //Brojac komentara
      $brojKomentara = array_count_values($nizIDjeva);

      $request = Request::create(route('getArticles'), 'GET');
      $response = app()->handle($request);
      $articles = $this->toObject($response);

      foreach($articles as $art) {
        $time = strtotime($art->created_at);
        $formatTo = date("d.m.y g:i A", $time);
        $art->created_at = $formatTo;
        if(array_key_exists($art->id,$brojKomentara)){
          $art->comments_no = $brojKomentara[$art->id];
        } else
            $art->comments_no = 0;
      }


      if($response->isSuccessful()) {
        return view('home', ['article' => $articles]);
      }

      return view('home', ['article'=>$article]);

    }

    private function toObject($whatever) {
      $reflection = new ReflectionClass($whatever);
      $property = $reflection->getProperty('data');
      $property->setAccessible(true);
      $data = $property->getValue($whatever);
      $object = json_decode($data);
      return $object;
    }

}
