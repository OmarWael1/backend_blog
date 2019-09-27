<?php

namespace App\Http\Controllers\admin;

use App\Models\Research;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
class ResearchController extends Controller
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
        $researches = Research::all();
        return view('admin/research/all_researches')->with('researches',$researches);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin/research/add_research');
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
            $cover = $request->file('photo');
            $extension = $cover->getClientOriginalExtension();
            Storage::disk('public')->put($cover->getClientOriginalName().'.'.$extension,  File::get($cover));
            $data = ['title' => $request->title, 'body' => $request->body, 'date_of_publication' => $request->date_of_publication];
            $validator = Validator::make($data, [
                'title' => ['required', 'string', 'max:255'],
                'body' => ['required', 'string'],
                'date_of_publication' => ['required'],
            ]);
            if ($validator->fails()) {
                return redirect('admin/research/add')
                    ->withErrors($validator)
                    ->withInput();
            }
            Research::create(['title' => request('title'), 'body' => request('body'),
                'date_of_publication' => $request->date_of_publication,'image_name'=>$cover->getClientOriginalName().'.'.$extension ]);
            Session::flash('message', 'research created successfully');
        }
        return view('admin/research/add_research');
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
           $research = Research::findOrFail($id);
           return view('admin/research/view_research')->with('research', $research);
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
            $research = Research::findOrFail($id);
            return view('admin/research/edit_research')->with('research', $research);
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
            return redirect('/research/edit')
                ->withErrors($validator)
                ->withInput();
        }
        try {
            $research = Research::findOrFail($request->id);
            $research->update($data);
            Session::flash('message','research updated successfully');
            return view('admin/research/edit_research')->with('research', $research);
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
        Research::destroy($id);
        $researches = Research::all();
        Session::flash('message','research deleted successfully');
        return view('admin/research/all_researches')->with('researches',$researches);
    }
}
