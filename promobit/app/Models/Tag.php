<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name', 'detail', 'tag_image_url'];

    public function search($filter =null){
        $result = $this->where('name', 'LIKE', "%{$filter}%")->orderBy('id')->paginate(5);
        return $result;
    }
    public function products(){
        $this->belongsToMany(Products::class, 'tag_product');
    }

}
