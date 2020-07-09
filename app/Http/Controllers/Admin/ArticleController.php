<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Article;

class ArticleController extends Controller
{
    // public function index(){
    // 	// return view('admin/article/index')->with('Article',\App\Article::all());
    // 	   return view('admin/article/index');
    // 	   // return view('index');
    // 	   var_dump(1111);
    // }
    public function index(){
    	return view('admin/article/index')->withArticles(Article::all());
    	// return view('admin/article/index')->with('Articles',\App\Article::all());
    }
}
