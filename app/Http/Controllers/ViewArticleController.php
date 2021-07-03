<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use ReflectionClass;
use GuzzleHttp\Client;

class ViewArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
    }

    public function index($id)
    {
       // echo $id;
      $request = Request::create(route('getArticle', $id), 'GET');
      $response = app()->handle($request);

      $article = $this->toObject($response);

      $request = Request::create(route('getCommentsForArticle', $id), 'GET');
      $response2 = app()->handle($request);

      $comments = $this->toObject($response2);

      foreach($comments as $comm) {
        $time = strtotime($comm->created_at);
        $formatTo = date("d.m.y g:i A", $time);
        $comm->created_at = $formatTo;
      }

      //print_r($comments);

      if($response->isSuccessful()) {
        return view('article', ['article' => $article, 'comments' => $comments]);
      }
      return view('article');
    }

  public function delete($id) {
    // $request = Request::create(route('deleteArticle', $id), 'DELETE');
    // $response = app()->handle($request);
    if($response->status() == 204) {
      return redirect()->route('home');
    } else {
      echo "Something went wrong!";
    }
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
