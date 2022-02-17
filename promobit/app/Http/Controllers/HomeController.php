<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Tag;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth')
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        
        return view('home');
    }
    public function welcome(){
        $repo = new Product;
        $repo2= new Tag;
        $produtos = $repo->sumarizador();
        $a=0;
        $agrupador=array();
        
        foreach($produtos as $produto){
                $produto->url_tags_image = $repo2->getProductTagsById($produto->id);
                $agrupador[$a]= $produto;
                $a++;
            
        }
        return view('welcome', compact('agrupador'));
    }
}
