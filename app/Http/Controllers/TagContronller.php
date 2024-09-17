<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagContronller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();
        return view('tags.index', compact('tags'));
    }
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate(
            [
                'name' => 'required|max:255',
            ],
            [
                'name.required' => 'لقد نسيت الاسم '
            ]

        );
        Tag::create($validatedData);
        return redirect()->route('tags.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tag = Tag::find($id);
        return view("tags.show", compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $tag = Tag::find($id);
        return view("tags.edit", compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validatedData = $request->validate(
            [
                'name' => 'required|max:255',
            ],
            [
                'name.required' => 'لقد نسيت الاسم '
            ]

        );
        $tag = Tag::find($id);
        $tag->update($validatedData);
        return redirect()->route('tags.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tag = Tag::find($id);
        $tag->delete();
        return redirect()->route('tags.index');
    }
}
