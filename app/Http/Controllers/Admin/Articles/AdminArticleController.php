<?php

namespace App\Http\Controllers\Admin\Articles;

use App\User;
use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Http\Helpers\Admin\Article as Articles;

class AdminArticleController extends Controller
{
    public function __construct()
    {
    	return $this->middleware(['auth','admin']);
    }

    public function AdminAllArticles()
    {
        $articles = Article::withTrashed();
        $paginate = 5;
        $columns = ['status','visibility'];
        $queries = [];
        if (request('search')) {
            $articles = $articles->where('title','%LIKE%',request('search'))
            ->orWhere('content','%LIKE%',request('search'));
            $queries['search'] = request('search');
        }
        //Show More than 5 Per Page
        if (request('show')) {
            $paginate = intval(request('show'));
            $queries['show'] = request('show');
        }

        foreach ($columns as $column) {
            if (request($column)){
                $articles = $articles->where($column,strtoupper(request($column)));
                $queries[$column] = request($column);
            }
        }
        $articles = $articles->paginate($paginate)->appends($queries);
    	return view('Admin.Dashboard.Articles.index',compact('articles'));
    }


    public function AdminBanAnArticle($article)
    {
        $article = Article::findOrFail($article);
        if (Articles::BanArticle($article->id)) {
            return back()->with('success','Article Banned Successfully!');
        }else{
            return back()->with('error','Something Went Wrong!');
        }
    }


    public function AdminUnBanAnArticle($article)
    {
        $article = Article::findOrFail($article);
        if (Articles::UnBanArticle($article->id)) {
            return back()->with('success','Article UnBanned Successfully!');
        }else{
            return back()->with('error','Something Went Wrong!');
        }
    }

    public function AdminPublishAnArticle($article)
    {
        $article = Article::findOrFail($article);
        if (Articles::PublishArticle($article->id)) {
            return back()->with('success','Article Published Successfully!');
        }else{
            return back()->with('error','Please Unban this Article then Publish it!');
        }
    }

    public function AdminArchiveAnArticle($article)
    {
        $article = Article::findOrFail($article);
        if (Articles::ArchiveArticle($article->id)) {
            return back()->with('success','Article Archived Successfully!');
        }else{
            return back()->with('error','Please Unban this Article then Archive it!');
        }
    }

    public function AdminArticleStatistics($article)
    {
        $article = Article::findOrFail($article);
        return view('Admin.Dashboard.Articles.DataStatistics',compact('article'));
    }

    public function AdminReadArticle($id)
    {
        $article = Article::findOrFail($id);
        $relatedArticles = Article::take(10)->where('id','!=',$article->id)->get();
        return view('Admin.Dashboard.Articles.Read.index')->with([
            'article' => $article,
            'relatedArticles' => $relatedArticles,
        ]);
    }

    public function AdminEditArticle($article)
    {
        $article = Article::findOrFail($article);
        return view('Admin.Dashboard.Articles.Edit.index',compact('article'));  
    }

    public function AdminUpdateArticle(Request $request, $article)
    {
        //dd($request->all());
        $rules = [
            'title.required' => 'Title Can not be Empty',
            'content.required' => 'Article Can not be Empty',
            'title.unique' => 'Article already Exists with this Title.Please Write Something New',
            'content.unique' => 'Article already Exists with this Content.Please Write Something New',
        ];
        $request->validate([
            'title' => 'required|string|unique:articles,title,'.$article,
            'content' => 'required|string|unique:articles,content,'.$article,
        ],$rules);
        if (!is_null($article = Article::findOrFail($article))) {
                $data = [
                    'title' => $request->title,
                    'content' => $request->content,
                ];
               if ($article->update($data)) {
                   return back()->with('success','Updated Successfully');
               }else{
                return back()->with('error','Something Went Wrong!');
                }
            }else{
                return back()->with('error','Something Went Wrong!');
            }
    }

    public function AdminDeleteArticle($article)
    {

    if ($article = Article::findOrFail($article)) {
            if ($article->forceDelete()) {
             return back()->with('success','Article Deleted Successfully!');
            }else{
                return back()->with('error','Something Went Wrong!');
            }
        }else{
            return back()->with('error','Something Went Wrong!');
        }
    }
}
