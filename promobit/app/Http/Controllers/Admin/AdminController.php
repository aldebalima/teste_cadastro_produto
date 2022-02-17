<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $repoTag = new Tag;
        $repoProd = new Product;

        $result1 = $repoProd->sumarizador();
        $result2 = $repoTag->sumarizador();
        $result3 = $repoProd->classifiedProducts();
        return view('admin.index', compact('result1', 'result2', 'result3'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.products.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProduct $request)
    {
        //
        $infos = $request->all();
        $product = new Product();
        if($request->hasFile('image') && $request->image->isValid()){
            $local= $request->image->store('public/products');
            $infos['image'] = str_replace('public/', '', $local);
        }
        
        $product->create($infos);
        return redirect()->route('products.index')
            ->with('success', 'Produto cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateProduct $request, Product $product)
    {
        //Verificando se produto existe
        if(!$product = Product::find($product->id)){
            return redirect()->back();
        }
        $infos = $request->all();
        //Remoção de Imagem
        if($request->hasFile('image') && $request->image->isValid()){
            if(Storage::exists("public/{$product->image}")){
                Storage::delete("public/{$product->image}");
            }
            $local= $request->image->store('public/products');
            $infos['image'] = str_replace('public/', '', $local);
        }
        $product->update($infos);
        return redirect()->route('products.index')->with('success', 'Produto atualziado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if(Storage::exists("public/{$product->image}")){
            Storage::delete("public/{$product->image}");
        }
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Produto deletado com sucesso');
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
        $holder = new Product;
        $products = $holder->search($request->filter);
        return view('admin.products.index', ['products' => $products, 'filters'=> $filters]);
    }

}
