<?php

namespace App\Http\Controllers\reader;

use App\Models\Article;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Research;
use App\Models\Video;

class BookAndResearchPageController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
// Articles , Books and researches , videos
    public function indexForBooks()
    {
        $publishedBooks = Book::where('category', 'published')->get();
        $unpublishedBooks = Book::where('category','unpublished')->get();
        //$researches = Research::all();
        return view('reader/books')->with('publishedBooks',$publishedBooks)
                                                    ->with('unpublishedBooks',$unpublishedBooks);
    }

    public function indexForResearches()
    {

        $researches = Research::all();
        return view('reader/researches')->with('researches',$researches);
    }


    public function showBook($id)
    {
        try {
            $book = Book::findOrFail($id);
            $book->number_of_readers++;
            $book->save();
            return view('reader/view_book')->with('book', $book);
        }catch (ModelNotFoundException $e){
            abort(404);
        }
    }

    public function showResearch($id)
    {
        try {
            $research = Research::findOrFail($id);
            $research->number_of_readers++;
            $research->save();
            return view('reader/view_research')->with('research', $research);
        }catch (ModelNotFoundException $e){
            abort(404);
        }
    }
  }
