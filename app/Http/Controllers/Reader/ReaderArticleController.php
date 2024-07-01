<?php

namespace App\Http\Controllers\Reader;

use App\User;
use App\Article;
use App\ReportArticle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Helpers\Admin\Article as ArticleHelper;

class ReaderArticleController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth','reader']);
    }

    public function ReaderSearchStories(Request $request)
    {

        $articles = Article::where('title', 'like', '%'.$request->search.'%')
               ->orWhere('content', 'like', '%'.$request->search.'%')->paginate(6);

        return view('Reader.Dashboard.Articles.AllArticles',compact('articles'));
    }

    public function ReaderReadArticle($article)
    {
        $article = Article::findOrFail($article);
        if (ArticleHelper::IsPublished($article->id)) {
            $related = Article::where('id','!=',$article->id)->inRandomOrder()->take(10)->get();
            if ($related->isNotEmpty()) {
                $relatedArticles = $related;
            }else{
                $relatedArticles = false;
            }
            if ($article->update(['views' => $article->views+1])) {
                return view('Reader.Dashboard.Articles.Read.index')
                ->with([
                    'article' => $article,
                    'relatedArticles' => $relatedArticles,
                ]);
            }else{
                return back()->with('error','Something Went Wrong!');
            }
        }else{
            return back()->with('error','Something Went Wrong!');
        }
    }

    public function ReaderReportArticle(Request $request, $article)
    {
        $request->validate([
            'report_message' => 'nullable|string',
        ]);

        if ($article = Article::findOrFail($id)) {

            $data = [
                'user_id' => Auth::user()->id,
                'article_id' => $article->id, 
                'report_message' => $request->report_message,
            ];

            if (ReportArticle::create($data)) {
                
                 if ($article->update(['reports' => $article->reports+1])) {

                    return back()->with('success','Thanks for your Report.We will look back into it');
                 }else{

                return back()->with('error','Something Went Wrong!');
            }

            }else{

                return back()->with('error','Something Went Wrong!');
            }

        }else{

            abort(404);

        }
    }
}
