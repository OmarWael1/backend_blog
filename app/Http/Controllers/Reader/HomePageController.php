<?php

namespace App\Http\Controllers\reader;

use App\Models\Article;
use App\Http\Controllers\Controller;
use App\Models\Research;
use App\Models\Video;

class HomePageController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
// Articles , Books and researches , videos
    public function index()
    {
        $articles = Article::paginate(3);
        $videos = Video::paginate(1);
        $researches = Research::paginate(2);
        return view('reader/home')->with('articles',$articles)->with('videos',$videos)->with('researches',$researches);
    }

  }
