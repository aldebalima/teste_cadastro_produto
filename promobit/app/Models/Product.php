<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $fillable = ['name','detail', 'image'];

    public function tags(){
        $this->belongsToMany(Tag::class, 'tag_product');
    }
    public function search($filter =null){
        $result = $this->where('name', 'LIKE', "%{$filter}%")->latest()->paginate();
        return $result;
    }
    /**
     * Metodo retorna todas as Tags de um produto com base em um filtro
     */
    public function searchTagsProduct($filter =null){
        $result = $result = DB::table('tag_product')
                    ->join('tags', 'tag_id', '=', 'tags.id')
                    ->select('tags.*')
                    ->where('product_id', '=', $this->id)
                    ->where('tags.name', 'LIKE', "%{$filter}%")
                    ->paginate();
                    
        return $result;
    }
    /**
     * Metodos deleta todas as tags de um determinado produto
     */
    public function deleteTagsProduct(){
        DB::table('tag_product')
                    ->where('product_id', '=', $this->id)->delete();
    }
    /**
     * Metodo deleta tag de um produto por Id
     */
    public function deleteTagsProductById($tag_id){
        DB::table('tag_product')
                    ->where('product_id', '=', $this->id)
                    ->where('tag_id', '=', $tag_id )
                    ->delete();
    }
    /**
     * Metodo para pegar todos as tags de um produto
     */
    public function getProductTags(){
        $result = DB::table('tag_product')
                    ->join('tags', 'tag_id', '=', 'tags.id')
                    ->select('tags.*')
                    ->where('product_id', '=', $this->id)
                    ->paginate();
        return $result;

    }
    /**
     * Metodos de inserção tabela tag_product
     */
    public function storeProductTags($tag=null){
        DB::table('tag_product')->insertOrIgnore([
            ["product_id"=>$this->id, "tag_id" => $tag]]);
    }
    /**
    * Metodo retorna dados sobre produtos 
    */
    public function sumarizador(){
        $result = DB::select('SELECT products.name, products.id, COUNT(DISTINCT(tags.id)) AS total_tags,
                  GROUP_CONCAT(tags.name) AS todos_as_tags FROM tag_product
                  JOIN tags ON(tags.id = tag_product.tag_id)
                  RIGHT JOIN products ON(products.id = tag_product.product_id) 
                  GROUP BY (products.id)
                  ORDER BY total_tags DESC');
        return $result;
    }
    
}
