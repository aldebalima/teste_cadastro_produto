<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateTag;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;


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
        $infos = $request->all();
        $tag = new Tag();
        if($request->hasFile('image') && $request->image->isValid()){
            $local= $request->image->store('tags');
            $infos['image'] = str_replace('public/', '', $local);
        }
        $tag->create($infos);
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
        
        $infos = $request->all();
        //Remoção de Imagem
        if($request->hasFile('image') && $request->image->isValid()){
            if(Storage::exists("public/{$tag->image}")){
                Storage::delete("public/{$tag->image}");
            }
            $local= $request->image->store('tags');
            $infos['image'] = str_replace('public/', '', $local);
        }
        $tag->update($infos);


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
        if(Storage::exists("public/{$tag->image}")){
            Storage::delete("public/{$tag->image}");
        }
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
