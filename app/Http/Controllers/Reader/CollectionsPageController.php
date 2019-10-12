<?php

namespace App\Http\Controllers\reader;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use App\Models\Paint;

class CollectionsPageController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collections = Collection::all();
        return view('reader/collections')->with('collections',$collections);
    }

    public function show($id)
    {
        try {
            $collection = Collection::findOrFail($id);
            $collection->number_of_readers ++;
            $collection->save();

            $paintings = Paint::where('collection_id', $id)->get();

            return view('reader/view_collection')
            ->with('collection', $collection)
            ->with('paintings', $paintings);
        } catch (ModelNotFoundException $e){
            abort(404);
        }
    }

  }
