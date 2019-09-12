<?php

namespace App\Http\Controllers\admin;

use App\Models\Article;
use App\Models\Image;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
class ArticleController extends Controller
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
        $articles = Article::all();
        return view('admin/article/all_articles')->with('articles',$articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/article/add_article');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('photo'))
        {
         //   dd($request);
            $cover = $request->file('photo');
            $extension = $cover->getClientOriginalExtension();
            Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));
         //   $image = Image::create(['image_name'=>$cover->getFilename().'.'.$extension]);
            $data = ['title' => $request->title ,'body' => $request->body, 'type' => $request->type , 'category' => $request->category,
                 'date_of_publish' => $request->date_of_publish ];
          //  dd($data);
            $validator = Validator::make($data, [
                'title' => ['required', 'string', 'max:255'],
                'body' => ['required', 'string'],
                'type' => ['required' , 'string'],
                'category' => ['required', 'string'],
                'date_of_publish' => ['required', 'string'],

            ]);
            if ($validator->fails()) {
                return redirect('admin/article/add')
                    ->withErrors($validator)
                    ->withInput();
            }
            Article::create(['title' => request('title') , 'body' => request('body') ,
                             'category' => request('category') ,'image_name'=>$cover->getFilename().'.'.$extension ,
                             'type' => request('type'), 'date_of_publish' => request('date_of_publish')]);

            Session::flash('message','article created successfully');
        }

        return view('admin/article/add_article')->with('status','article created successfully');
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
           $article = Article::findOrFail($id);
           return view('admin/article/view_article')->with('article',$article);
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
            $article = Article::findOrFail($id);
            return view('admin/article/edit_article')->with('article', $article);
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

        $data = ['title' => $request->title ,'body' => $request->body, 'type' => $request->type , 'category' => $request->category,
            'date_of_publish' => request('date_of_publish')];
        $validator = Validator::make($data, [
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],
            'type' => ['required' , 'string'],
            'category' => ['required', 'string'],
            'date_of_publish' => ['required', 'string'],

        ]);
        if ($validator->fails()) {
            return redirect('admin/article/edit')
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $article = Article::findOrFail($request->id);
            $article->update($data);
            Session::flash('message','article updated successfully');
            return view('admin/article/edit_article')->with('article', $article);
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
        //
    }
}
