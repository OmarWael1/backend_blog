<?php

namespace App\Http\Controllers\admin;

use App\Models\Collection;
use App\Models\Paint;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
class PaintController extends Controller
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
        $paints = Paint::all();
        return view('admin/paint/all_paints')->with('paints',$paints);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $collections = Collection::all();
        if(count($collections) == 0){
            Session::flash('message','please add a collection first before a paint..');
            return view('admin/collection/add_collection');
        }
        return view('admin/paint/add_paint')->with('collections',$collections);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('file_name'))
        {
            $paint = $request->file('file_name');
            $collections = Collection::all();
            $extension = $paint->getClientOriginalExtension();
            Storage::disk('public')->put($paint->getFilename().'.'.$extension,  File::get($paint));
            $data = ['title' => $request->title ,'description' => $request->description, // 'collection' => $request->collection,
                      'date_of_publish' => $request->date_of_publish];
            $validator = Validator::make($data, [
                'title' => ['required', 'string'],
                'description' => ['required', 'string'],
               // 'collection' => ['required', 'string'],
                'date_of_publish' => ['required', 'string'],

            ]);
            if ($validator->fails()) {
                return redirect('admin/paint/add')->with('collections',$collections)
                    ->withErrors($validator)
                    ->withInput();
            }
            Paint::create(['title' => request('title')  ,'collection_id' => 1,
                             'description' => request('description'),
                             'date_of_publish' => request('date_of_publish'),
                            'file_name'=>$paint->getFilename().'.'.$extension ,
                            'collection_id' => request('collection_id'),
                            ]);
            Session::flash('message','paint created successfully');
        }
        return view('admin/paint/add_paint')->with('collections',$collections);
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
           $paint = Paint::findOrFail($id);
           return view('admin/paint/view_paint')->with('paint', $paint);
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
            $paint = Paint::findOrFail($id);
            $collections = Collection::all();
            return view('admin/paint/edit_paint')->with('paint', $paint)->with('collections',$collections);
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

        $data = ['title' => $request->title ,'date_of_publish' => $request->date_of_publish, 'description' => $request->description ,
            'collection_id' => request('collection_id'), ];
        $validator = Validator::make($data, [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            //'collection' => ['required', 'string'],
            'date_of_publish' => ['required', 'string'],

        ]);
        $collections = Collection::all();
        if ($validator->fails()) {
            return redirect('admin/paint/edit/'.$request->id)->with('collections',$collections)
                ->withErrors($validator)
                ->withInput();
        }
        try {
            $paint = Paint::findOrFail($request->id);
            $paint->update($data);
            Session::flash('message','paint updated successfully');
            return view('admin/paint/edit_paint')->with('paint', $paint)->with('collections',$collections);
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
        Paint::destroy($id);
        $paints = Paint::all();
        Session::flash('message','paint deleted successfully');
        return view('admin/paint/all_paints')->with('paints',$paints);
    }
}
