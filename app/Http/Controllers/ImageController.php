<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arr['images'] = Image::All();
        // dd($arr['images']);
        return view('image.index')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('image.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'image' => 'image|required',
        ]);

        if ($request->hasFile('image')) {
            $imageName =  'image' . $request->imagable_id .".". $request->file('image')->extension();
            $request->image->move(public_path('images'), $imageName);
        } 
        $imagePath = 'images/'. $imageName;
        $image = new Image();
        $image->imagable_type = $request->imagable_type;
        $image->imagable_id = $request->imagable_id;
        $image->size = filesize($imagePath);
        $image->path = $imagePath;
        $image->name = $imageName;
        $image->extension = $request->file('image')->getClientOriginalExtension();
        $image->save();
        return redirect()->route('imagesNew.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        //
    }
}
