<?php

namespace App\Http\Controllers\admin;

use App\Models\Book;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
class BookController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view('admin/book/all_books')->with('books',$books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/book/add_book');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('book'))
        {
            $book = $request->file('book');
            $extension = $book->getClientOriginalExtension();
            Storage::disk('public')->put($book->getFilename().'.'.$extension,  File::get($book));
            $data = ['title' => $request->title ,'description' => $request->description,  'category' => $request->category,
                      'date_of_publication' => $request->date_of_publication];
            $validator = Validator::make($data, [
                'title' => ['required', 'string'],
                'description' => ['required', 'string'],
                'category' => ['required', 'string'],
                'date_of_publication' => ['required', 'string'],

            ]);
            if ($validator->fails()) {
                return redirect('admin/book/add')
                    ->withErrors($validator)
                    ->withInput();
            }
            Book::create(['title' => request('title') , 'description' => request('description') ,
                             'date_of_publication' => request('date_of_publication'),
                             'category' => request('category') ,'file_name'=>$book->getFilename().'.'.$extension ,
                            ]);
            Session::flash('message','book created successfully');
        }
        return view('admin/book/add_book');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       try {
           $book = Book::findOrFail($id);
           return view('admin/book/view_book')->with('book', $book);
       }catch (ModelNotFoundException $e){
           abort(404);
       }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $book = Book::findOrFail($id);
            return view('admin/book/edit_book')->with('book', $book);
        }catch (ModelNotFoundException $e){
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $data = ['title' => $request->title , 'description' => $request->description , 'category' => $request->category];
        $validator = Validator::make($data, [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'category' => ['required', 'string'],

        ]);
        if ($validator->fails()) {
            return redirect('admin/book/edit')
                ->withErrors($validator)
                ->withInput();
        }
        try {
            $book = Book::findOrFail($request->id);
            $book->update($data);
            Session::flash('message','book updated successfully');
            return view('admin/book/edit_book')->with('book', $book);
        }catch (ModelNotFoundException $e){
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::destroy($id);
        $books = Book::all();
        Session::flash('message','book deleted successfully');
        return view('admin/book/all_books')->with('books',$books);
    }
}
