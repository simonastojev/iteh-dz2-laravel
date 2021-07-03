<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Route;

class WriteArticleController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('web');
    }

    public function index()
    {
    //   $request = Request::create(route('apiLogin'), 'POST');
    //   $response = Route::dispatch($request);
    //   echo $response . 'test';
    
      return view('writeArticle');
    }

}
