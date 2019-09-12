<?php

namespace App\Http\Controllers\reader;

use App\Models\Article;
use App\Http\Controllers\Controller;
use App\Models\Research;
use App\Models\SmallStory;
use App\Models\Video;

class SmallStoryPageController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
// Articles , Books and researches , videos
    public function index()
    {
        $stories = SmallStory::all();
        return view('reader/small_stories')->with('stories',$stories);
    }

    public function show($id)
    {
        try {
            $story = SmallStory::findOrFail($id);
            $story->number_of_readers ++;
            $story->save();
            $stories = SmallStory::paginate(3);
            return view('reader/view_story')->with('story', $story)->with('stories',$stories);
        }catch (ModelNotFoundException $e){
            abort(404);
        }
    }
  }
