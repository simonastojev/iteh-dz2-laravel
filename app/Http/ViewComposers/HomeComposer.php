<?php 

// namespace App\Http\ViewComposers;

// use Illuminate\Contracts\View\View;
// use App\Http\Resources\ArticleResource;

// class HomeComposer {

//     /**
//      * The user repository implementation.
//      *
//      * @var ArticleResource
//      */
//     protected $articles;

//     /**
//      * Create a new profile composer.
//      *
//      * @param  ArticleResource  $articles
//      * @return void
//      */
//     public function __construct(Article $articles)
//     {
//         // Dependencies automatically resolved by service container...
//         $this->articles = $articles;
//     }

//     /**
//      * Bind data to the view.
//      *
//      * @param  View  $view
//      * @return void
//      */
//     public function compose(View $view)
//     {
//         $view->with('count', $this->articles->count());
//     }

// }