<?php

namespace App\Http\Controllers\reader;

use App\Models\Article;
use App\Http\Controllers\Controller;
use App\Models\Paint;
use App\Models\Research;
use App\Models\Video;

class PaintsPageController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paints = Paint::all();
        return view('reader/paintings')->with('paints',$paints);
    }

    public function show($id)
    {
        try {
            $paint = Paint::findOrFail($id);
            $paint->number_of_readers ++;
            $paint->save();
            return view('reader/view_paint')->with('paint', $paint);
        }catch (ModelNotFoundException $e){
            abort(404);
        }
    }

  }
