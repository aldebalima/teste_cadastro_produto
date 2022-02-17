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

    }
