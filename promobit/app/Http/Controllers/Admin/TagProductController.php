<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Tag;


class TagProductController extends Controller
{   
    protected $product;
    protected $tag;

    public function __construct(Product $product, Tag $tag){
        $this->product = $product;
        $this->tag = $tag;
    }
    /**
     * Pega as tags de um determinado produto
     */
    public function tags($idProduct){
        
        
        $product = $this->product->find($idProduct);
        
        if(!$product){
            return redirect()->back();
        }
        $tags = $product->getProductTags();
        
        return view('admin.tagsProduct.tags.index', ['tags' => $tags, 'product'=> $product]);
    }
    /**
     * Pega os produtos com determinada Tag
     */
    public function products($idTag){
        
        $tag = $this->tag->find($idTag);
        
        if(!$tag){
            return redirect()->back();
        }

        $products = $tag->products()->paginate();

        return view('admin.tagsProduct.products.index', ['tags' => $tags, 'product'=> $product]);
    }
    public function tagsAvaiable($idProduct){
        $product = $this->product->find($idProduct);
        
        if(!$product){
            return redirect()->back();
        }
        $tags = $this->tag->paginate();
        $tagsChecked = $product->getProductTags();

        return view('admin.tagsProduct.tags.avaiable', ['tags' => $tags, 'product'=> $product, 'tagsChecked' => $tagsChecked]);
    }
    public function storeListTags(Request $request, $idProduct){
        $product = $this->product->find($idProduct);
        
        if(!$product){
            return redirect()->back();
        }
        if($request->tags == null){
            return redirect()->back()->with('message', 'Selecione ao menos uma tag!');
        }
        $product->deleteTagsProduct();
        
        foreach($request->tags as $tag){
            
           $product->storeProductTags($tag);
        }
        
        
        return redirect()->route('tags.product.avaiable', $product->id);
    }
    public function search(Request $request, $idProduct){
         //
        $filters = $request->except('_token');
        $product = $this->product->find($idProduct);
        
        if(!$product){
            return redirect()->back();
        }
        
        $tags = $product->searchTagsProduct($request->filter);
        
        return view('admin.tagsProduct.tags.index', ['tags' => $tags, 'product'=> $product, 'filters'=> $filters]);

    }
    public function delete(Request $request, $idProduct=null){
        //
       
       $product = $this->product->find($idProduct);
       
       if(!$product){
           return redirect()->back();
       }
       
       $product->deleteTagsProductById($request->tag_id);
       $tags = $product->searchTagsProduct($request->filter);

       
       return view('admin.tagsProduct.tags.index', ['tags' => $tags, 'product'=> $product]);

   }
}
