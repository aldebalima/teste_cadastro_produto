<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tag extends Model
{
    protected $fillable = ['name', 'detail', 'image'];

    public function search($filter =null){
        $result = $this->where('name', 'LIKE', "%{$filter}%")->orderBy('id')->paginate(5);
        return $result;
    }
    public function products(){
        $this->belongsToMany(Products::class, 'tag_product');
    }
    public function countTags(){
       $result = DB::table('tag_product')                   
        ->join('products', 'tag_product.product_id', '=', 'products.id')
        ->join('tags', 'tag_product.tag_id', '=', 'tags.id')
        ->select('tags.id','tags.name', 'tags.detail', 'products.name')
        ->get();
        return $result;
    }
    public function sumarizador(){
        $result = DB::select('SELECT tags.name, tags.image, tags.id, COUNT(DISTINCT(products.id))  AS total_produtos, 
                  GROUP_CONCAT(products.name) AS todos_os_produtos FROM tag_product
                  RIGHT JOIN tags ON(tags.id = tag_product.tag_id)
                  LEFT JOIN products ON(products.id = tag_product.product_id) 
        GROUP BY (tags.id)
        ORDER BY (total_produtos) DESC');
        return $result;
    }
    /**
     * Metodo para pegar todos as tags de um produto
     */
    public function getProductTagsById($productId){
        $result = DB::table('tag_product')
                    ->join('tags', 'tag_id', '=', 'tags.id')
                    ->select('tags.*')
                    ->where('product_id', '=', $productId)
                    ->paginate();
        return $result;

    }

}
