<?php

namespace App\Http\Controllers\admin;

use App\Models\SmallStory;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
class SmallStoryController extends Controller
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
        $stories = SmallStory::all();
        return view('admin/story/all_stories')->with('stories',$stories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin/story/add_story');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('photo')) {
            //   dd($request);
            $cover = $request->file('photo');
            $extension = $cover->getClientOriginalExtension();
            Storage::disk('public')->put($cover->getClientOriginalName() . '.' . $extension, File::get($cover));

            $data = ['title' => $request->title, 'body' => $request->body, 'date_of_publication' => $request->date_of_publication];
            $validator = Validator::make($data, [
                'title' => ['required', 'string', 'max:255'],
                'body' => ['required', 'string'],
                'date_of_publication' => ['required'],
            ]);
            if ($validator->fails()) {
                return redirect('admin/story/add')
                    ->withErrors($validator)
                    ->withInput();
            }
            SmallStory::create(['title' => request('title'), 'body' => request('body'),
                'date_of_publication' => $request->date_of_publication, 'image_name' => $cover->getClientOriginalName() . '.' . $extension]);
            Session::flash('message', 'story created successfully');
        }
        return view('admin/story/add_story');
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
            $story = SmallStory::findOrFail($id);
            return view('admin/story/view_story')->with('story', $story);
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
            $story = SmallStory::findOrFail($id);
            return view('admin/story/edit_story')->with('story', $story);
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

        $data = ['title' => $request->title ,'body' => $request->body,'date_of_publication' => $request->date_of_publication];
        $validator = Validator::make($data, [
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],
            'date_of_publication' => ['required'],
        ]);
        if ($validator->fails()) {
            return redirect('admin/story/edit')
                ->withErrors($validator)
                ->withInput();
        }
        try {
            $story = SmallStory::findOrFail($request->id);
            $story->update($data);
            Session::flash('message','story updated successfully');
            return view('admin/story/edit_story')->with('story', $story);
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
        SmallStory::destroy($id);
        $stories = SmallStory::all();
        Session::flash('message','story deleted successfully');
        return view('admin/story/all_stories')->with('stories',$stories);
    }
}
