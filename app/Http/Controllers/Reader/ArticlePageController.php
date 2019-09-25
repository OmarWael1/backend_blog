<?php

namespace App\Http\Controllers\reader;

use App\Models\Article;
use App\Http\Controllers\Controller;
use App\Models\Research;
use App\Models\Video;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ArticlePageController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAr()
    {
        $islamicArticles = Article::where(['type' => 'arabic', 'category'=>'اسلاميه' ])->get();
        $jewishArticles = Article::where(['type' => 'arabic', 'category'=>'يهوديه' ])->get();
        $christianArticles = Article::where(['type' => 'arabic', 'category'=>'مسيحيه' ])->get();
        $variedArticles = Article::where(['type' => 'arabic', 'category'=>'متنوعه' ])->get();
        $literaryArticles = Article::where(['type' => 'arabic', 'category'=>'ادبيه' ])->get();
        $artisticArticles = Article::where(['type' => 'arabic', 'category'=>'فنيه' ])->get();
        $metaphysicsArticles = Article::where(['type' => 'arabic', 'category'=>'غيبيات' ])->get();

        return view('reader/articles')->with('islamicArticles',$islamicArticles)
                                            ->with('jewishArticles',$jewishArticles)
                                            ->with('christianArticles',$christianArticles)
                                            ->with('variedArticles',$variedArticles)
                                            ->with('literaryArticles',$literaryArticles)
                                            ->with('artisticArticles',$artisticArticles)
                                            ->with('metaphysicsArticles',$metaphysicsArticles);
    }

    public function indexFr()
    {
        $articles = Article::where('type' , 'french')->get();


        return view('reader/french_articles')->with('articles',$articles);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $article = Article::findOrFail($id);
            $article->number_of_readers++;
            $article->save();
            $articles = Article::orderBy('number_of_readers', 'desc')->paginate(3);
            return view('reader/view_article')->with('article', $article)->with('articles',$articles);
        }catch (ModelNotFoundException $e){
            abort(404);
        }
    }
  }
