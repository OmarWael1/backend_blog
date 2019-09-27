<?php

namespace App\Http\Controllers\admin;

use App\Models\Video;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
class VideoController extends Controller
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
        $videos = Video::all();
        return view('admin/video/all_videos')->with('videos',$videos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/video/add_video');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->hasFile('video'))
        {
            $video = $request->file('video');
            $extension = $video->getClientOriginalExtension();
            Storage::disk('public')->put($video->getFilename().'.'.$extension,  File::get($video));
            $data = ['title' => $request->title ,'date_of_publication' => $request->date_of_publication];
            $validator = Validator::make($data, [
                'title' => ['required', 'string'],
                'date_of_publication' => ['required', 'string'],

            ]);
            if ($validator->fails()) {
                return redirect('admin/video/add')
                    ->withErrors($validator)
                    ->withInput();
            }
            Video::create(['title' => request('title'),'date_of_publication' => request('date_of_publication'),
                             'file_name'=>$video->getFilename().'.'.$extension ,
                            ]);
            Session::flash('message','video created successfully');
        }
        return view('admin/video/add_video');
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
            $video = Video::findOrFail($id);
            return view('admin/video/view_video')->with('video', $video);
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
            $video = Video::findOrFail($id);
            return view('admin/video/edit_video')->with('video', $video);
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

        $data = ['title' => $request->title ,'date_of_publication' => $request->date_of_publication];
        $validator = Validator::make($data, [
            'title' => ['required', 'string', 'max:255'],
            'date_of_publication' => ['required', 'string'],

        ]);
        if ($validator->fails()) {
            return redirect('admin/video/edit')
                ->withErrors($validator)
                ->withInput();
        }
        try {
            $video = Video::findOrFail($request->id);
            $video->update($data);
            Session::flash('message','video updated successfully');
            return view('admin/video/edit_video')->with('video', $video);
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
        Video::destroy($id);
        $videos = Video::all();
        Session::flash('message','video deleted successfully');
        return view('admin/video/all_videos')->with('videos',$videos);
    }
}
