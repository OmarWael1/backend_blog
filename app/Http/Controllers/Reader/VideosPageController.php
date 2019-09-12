<?php

namespace App\Http\Controllers\reader;

use App\Models\Article;
use App\Http\Controllers\Controller;
use App\Models\Research;
use App\Models\Video;

class VideosPageController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
// Articles , Books and researches , videos
    public function index()
    {
        $videos = Video::all();
        return view('reader/videos')->with('videos',$videos);
    }

    public function show($id)
    {
        $video = Video::findOrFail($id);
        $video->number_of_readers++;
        $video->save();
        return view('reader/view_video')->with('video',$video);
    }

}
