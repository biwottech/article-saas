<?php
namespace App\Http\Controllers\Writer;

use App\Article;
use App\Competetion;
use App\CompetetionData;
use Illuminate\Http\Request;
use App\Http\Helpers\Writer\Writer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Helpers\Admin\Competetion as CompetetionHelper;

class WriterCompetetionController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth','writer']);
    }

    public function Competetions()
    {
        $competetions = new Competetion;
        $paginate = 5;
        $columns = ['status','result_status'];
        $queries = [];
        if (request('search')) {
            $competetions = $competetions->where('name','LIKE','%'.request('search').'%')
            ->orWhere('status','LIKE','%'.request('search').'%');
            $queries['search'] = request('search');
        }
        if (request('show')) {
            $paginate = intval(request('show'));
            $queries['show'] = request('show');
        }
        foreach ($columns as $column) {
            if (request($column)){
                $competetions = $competetions->where($column,strtoupper(request($column)));
                $queries[$column] = request($column);
            }
        }
        $competetions = $competetions->where('status','INITIALIZING')->paginate($paginate)->appends($queries);
        return view('Writer.Dashboard.Competetions.index',compact('competetions'));
    }

    /*begin::JoinCompetetion*/
    public function JoinCompetetion($id)
    {
        if ($subscription = Writer::hasAnyActiveSubscription(Auth::user()->id)) {
            $limit = Writer::PlanJoiningLimit($subscription->plan_id);
            $joined = Writer::CountJoinedCompetetionsWithPlan(Auth::user()->id,$subscription->plan_id);
            if ($joined < $limit) {
                if ($competetion = CompetetionHelper::IsInitializing($id)) {
                    $articles = Writer::AllArticles();
                    $paginate = 5;
                    $columns = ['status','visibility'];
                    $queries = [];
                    if (request('search')) {
                        $articles = $articles->where('title','LIKE','%'.request('search').'%')
                        ->orWhere('content','LIKE','%'.request('search').'%');
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
                    return view('Writer.Dashboard.Competetions.Join.index')
                           ->with([
                                'competetion' => $competetion,
                                'articles' => $articles,
                           ]);
                }else{
                    return back()->with('error',"Competetion should be Initializing in order to Join!");  
                }
            }else{
                return back()->with('error',"Sorry You can not Join More than ".$limit. " Competetions!"); 
            }
        }else{
            return back()->with('error',"Sorry You don't have any Active Subscription!");
        }
    }

    public function GuideLines($competetion)
    {
        if ($subscription = Writer::hasAnyActiveSubscription(Auth::user()->id)){
            if ($competetion = Competetion::find($competetion)) {
                return view('Writer.Dashboard.Competetions.GuideLines.index',compact('competetion'));
            }else{
                return back()->with('error',"Something Went Wrong!");  
            }
        }else{
            return back()->with('error',"Sorry You don't have any Active Subscription!");
        }
    }


    /*begin::WithDrawCompetetion*/
    public function WithDrawCompetetion($id)
    {
        return "hello";
    }

    /*begin::JoinedCompetetions*/
    public function JoinedCompetetions()
    {
        $competetions = Writer::JoinedCompetetions(Auth::user()->id);
        $paginate = 5;
        $columns = ['status','result_status'];
        $queries = [];
        if (request('search')) {
            $competetions = $competetions->where('name','LIKE','%'.request('search').'%')
            ->orWhere('status','LIKE','%'.request('search').'%');
            $queries['search'] = request('search');
        }
        if (request('show')) {
            $paginate = intval(request('show'));
            $queries['show'] = request('show');
        }
        foreach ($columns as $column) {
            if (request($column)){
                $competetions = $competetions->where($column,strtoupper(request($column)));
                $queries[$column] = request($column);
            }
        }
        $competetions = $competetions->paginate($paginate)->appends($queries);
        return view('Writer.Dashboard.Competetions.Joined.index',compact('competetions'));
    }

    /*begin::SubmitArticle*/
    public function SubmitArticle($article,$competetion)
    {
        $article = Article::findOrFail($article);
        if ($subscription = Writer::hasAnyActiveSubscription(Auth::user()->id)) { 
            if ($competetion = Competetion::find($competetion)) {
                if (CompetetionHelper::IsInitializing($competetion->id)) {
                $limit = Writer::PlanSubmittingLimit($subscription->plan_id);
                $submitted = Writer::CountSubmittedWithSubscription(Auth::user()->id,$competetion->id,$subscription->id);
                    if (!($articleSubmitted = Writer::ArticleSubmittedWithSubscription(Auth::user()->id,$competetion->id,$subscription->id,$article->id))) {
                        $data = [
                            'competetions_id' => $competetion->id,
                            'user_id' => Auth::user()->id,
                            'subscription_id' => $subscription->id,
                            'article_id' => $article->id,
                        ];
                        if (CompetetionData::create($data)) {
                            return back()->with('success',"Article Submitted Successfully!");
                        }else{
                            return back()->with('error',"Something Went Wrong!");
                        }
                    }else{
                        return back()->with('error',"This Article is Already Submitted.!");   
                    }
                }else{
                    return back()->with('error',"Competetion should be Initializing in order to Join!"); 
                }
            }else{
                return back()->with('error',"Something Went Wrong!");  
            }
        }else{
            return back()->with('error',"Sorry You don't have any Active Subscription!");  
        }
    }

    /*begin::WithdrawArticle*/
    public function WithDrawAnArticle($article,$competetion)
    {
        $article = Article::findOrFail($article);
        if ($submitted = Writer::ArticleIsSubmitted(Auth::user()->id,$article->id)) {
            if ($submitted->delete()) {
                return back()->with('success',"Successfully Withdrawn from Competetion!"); 
            }else{
                return back()->with('error',"Something Went Wrong!");  
            } 
        }else{
            return back()->with('error',"Something Went Wrong!");  
        } 
    }

    public function ViewedArticles()
    {
        return view('Writer.Dashboard.Competetions.Articles.ViewedArticles');
    }

    public function SubmittedArticles()
    {
        return view('Writer.Dashboard.Competetions.Articles.SubmittedArticles');
    }

    public function RatedArticles()
    {
        return view('Writer.Dashboard.Competetions.Articles.RatedArticles');
    }

}
