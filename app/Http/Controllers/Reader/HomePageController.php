<?php

namespace App\Http\Controllers\reader;

use App\Models\Article;
use App\Http\Controllers\Controller;
use App\Models\Research;
use App\Models\Video;
use App\Models\Visitors;

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
        $visitors_number = Visitors::first();
        if(count($visitors_number) == 0 ){
            $visitors_number =  Visitors::create();
        }
        $visitors_number->number++ ;
        $visitors_number->update();

        return view('reader/home');
    }

  }
