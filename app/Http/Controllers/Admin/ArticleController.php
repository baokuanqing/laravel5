<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Article;

class ArticleController extends Controller
{
    
    public function index()
    {
    	return view('admin/article/index')->withArticles(Article::all());
    	// return view('admin/article/index')->with('Articles',\App\Article::all());
    }

    public function create(){
    	return view('admin/article/create');
    }

    public function store(Request $request)
    {
    	$this->validate($request,[
            'title'=> 'required|unique:articles|max:225',
            'body'=> 'required',
        ]);

        $article = new Article;
        $article->title = $request->get('title');
        $article->body = $request->get('body');
        $article->user_id = $request->user()->id;

        if($article->save()){
            return redirect('admin/articles');

        }else{
            return redirect()->back()->withInput()->withErrors('保存失败！');

        }
    }
    public function destroy($id)
    {
        Article::find($id)->delete();
        return redirect()->back()->withInput()->withErrors('删除成功！');
    }
   public function edit($id,Request $request)
   { 
    if($request->old('title')!=null)
    { 
       return view('admin/article/edit')->withArticle((object)[ 'title'=>$request->old('title'), 'body'=>$request->old('body'), 'id'=>$request->old('id') ]); 
     }else{ 
       return view('admin/article/edit')->withArticle(Article::find($id)); 
     } 
    }

}


