<?php

namespace App\Http\Controllers;

use App\Http\Requests\PictureFormRequest;
use App\Picture;
use Illuminate\Http\Request;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pictures = Picture::all();
        return view('galery', compact('pictures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PictureFormRequest $request)
    {
        $picture = new Picture();
        $picture->title = $request->input('title');
        $picture->user = $request->input('user');
        $picture->description = $request->input('description');
        if($request->hasFile('image')){
            $picture->image = $request->file('image')->store('uploads', 'public');
            $picture->save();
        }
        return redirect()->route('galery.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function show(Picture $picture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $picture = Picture::find($id);
        return view('edit', compact('id', 'picture'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function update(PictureFormRequest $request, $id)
    {
        $nuevos = request()->except(['_token', '_method', 'action']);
        $picture = Picture::find($id);
        if($request->hasFile('image')){
            $old = $picture->image;
            $nuevos['image'] = $request->file('image')->store('uploads', 'public');
            unlink($old);
            $picture->update($nuevos);
            $picture->image= $nuevos['image'];
        }
        else{
            $picture->title = $request->input('title');
            $picture->user = $request->input('user');
            $picture->description = $request->input('description');
        }
        $picture->save();
        return redirect()->route('galery.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $picture = Picture::find($request->input('id'));
        if(unlink($picture->image)){
            $picture ->delete();
        }
        return redirect()->route('galery.index');
    }
}
