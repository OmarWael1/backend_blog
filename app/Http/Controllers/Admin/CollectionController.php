<?php

namespace App\Http\Controllers\admin;

use App\Models\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
class CollectionController extends Controller
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
        $collections = Collection::all();
        return view('admin/collection/all_collections')->with('collections',$collections);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/collection/add_collection');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            $data = ['name' => $request->name ,'description' => $request->description,
                      'date_of_publish' => $request->date_of_publish];
            $validator = Validator::make($data, [
                'name' => ['required', 'string'],
                'description' => ['required', 'string'],
                'date_of_publish' => ['required', 'string'],

            ]);
            if ($validator->fails()) {
                return redirect('admin/collection/add')
                    ->withErrors($validator)
                    ->withInput();
            }
            Collection::create(['name' => request('name'),
                                 'description' => request('description'),
                                 'date_of_publish' => request('date_of_publish'),
                            ]);
            Session::flash('message','collection created successfully');

            return view('admin/collection/add_collection');
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
           $collection = Collection::findOrFail($id);
           return view('admin/collection/view_collection')->with('collection', $collection);
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
            $collection = Collection::findOrFail($id);
            return view('admin/collection/edit_collection')->with('collection', $collection);
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

        $data = ['name' => $request->name ,'date_of_publish' => $request->date_of_publish, 'description' => $request->description,];
        $validator = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'date_of_publish' => ['required', 'string'],

        ]);
        if ($validator->fails()) {
            return redirect('admin/collection/edit/'.$request->id)
                ->withErrors($validator)
                ->withInput();
        }
        try {
            $collection = Collection::findOrFail($request->id);
            $collection->update($data);
            Session::flash('message','collection updated successfully');
            return view('admin/collection/edit_collection')->with('collection', $collection);
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

    }
}
