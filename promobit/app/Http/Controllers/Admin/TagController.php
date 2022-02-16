<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateTag;
use App\Models\Tag;

class TagController extends Controller
{
   

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tags = Tag::orderBy('id')->paginate(5);
        return view('admin.tags.index', compact('tags'));
                    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.tags.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateTag $request)
    {
        //
        
        Tag::create($request->all());
        return redirect()->route('tags.index')
            ->with('success', 'Tag cadastrada com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
        return view('admin.tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        //
        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateTag $request, Tag $tag)
    {
        $tag->update($request->all());
        return redirect()->route('tags.index')->with('success', 'Tag atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tags.index')->with('success', 'Tag deletada com sucesso');
    }

    /**
     * Display a listing of the resource with a specific filter.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        //
        $filters = $request->except('_token');
        $holder = new Tag;
        $tags = $holder->search($request->filter);
        return view('admin.tags.index', ['tags' => $tags, 'filters'=> $filters]);
    }
    

}
