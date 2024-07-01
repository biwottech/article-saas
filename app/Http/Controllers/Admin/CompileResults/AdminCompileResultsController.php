<?php
namespace App\Http\Controllers\Admin\CompileResults;

use App\Result;
use App\Article;
use App\AgeGroup;
use App\Competetion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Helpers\Admin\Competetion as CompetetionHelper;

class AdminCompileResultsController extends Controller
{
    public function __construct()
    {
    	return $this->middleware(['auth','admin']);
    }

    public function CompileResults($competetion)
    {
        $competetion = Competetion::findOrFail($competetion);
        CompetetionHelper::Start($competetion->id);
        CompetetionHelper::End($competetion->id);
        $age_groups = CompetetionHelper::TotalAgeGroups($competetion->id);
        $paginate = 5;
        $queries = [];
        if (request('show')) {
            $paginate = request('show');
            $queries['show'] = request('show');
        }

        if (request('search')) {
            $age_groups = $age_groups->where('group_from','LIKE','%'.request('search').'%')
            ->orWhere('group_to','LIKE','%'.request('search').'%')
            ->orWhere('description','LIKE','%'.request('search').'%');
            $queries['search'] = request('search');
        }
        $age_groups = $age_groups->paginate($paginate)->appends($queries);
        return view('Admin.Dashboard.Competetions.CompileResults.index')
               ->with([
                    'competetion' => $competetion,
                    'age_groups' => $age_groups,
                ]);
    }

    public function CompetetionDetails($competetion)
    {
        $competetion = Competetion::findOrFail($competetion);
        CompetetionHelper::Start($competetion->id);
        CompetetionHelper::End($competetion->id);
        dd($competetion);
    }

    public function ViewArticlesInAgeGroup($competetion,$group)
    {
        $competetion = Competetion::findOrFail($competetion);
        $group = AgeGroup::findOrFail($group);

        CompetetionHelper::Start($competetion->id);
        CompetetionHelper::End($competetion->id);

        $articles = CompetetionHelper::ArticlesInAgeGroup($competetion->id,$group->id);
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
        return view('Admin.Dashboard.Competetions.CompileResults.ArticlesInAgeGroup.index')
            ->with([
            'competetion' => $competetion,
            'group' => $group,
            'articles' => $articles,
        ]);
    } 

    public function CompileResultsForAgeGroup($competetion,$group)
    {
        $competetion = Competetion::findOrFail($competetion);
        $group = AgeGroup::findOrFail($group);
        CompetetionHelper::Start($competetion->id);
        CompetetionHelper::End($competetion->id);
        $articles = CompetetionHelper::ArticlesInAgeGroup($competetion->id,$group->id);
        $paginate = 5;
        $columns = ['rating'];
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
        
        if ($articles) {
            $articles = $articles->paginate($paginate)->appends($queries);
        }else{
            $articles = false;
        }
        return view('Admin.Dashboard.Competetions.CompileResults.ResultForAgeGroup.index')
            ->with([
            'competetion' => $competetion,
            'group' => $group,
            'articles' => $articles,
        ]);
    }

    public function AddtoWinningList($competetion,$article,$group)
    {
        $competetion = Competetion::findOrFail($competetion);
        CompetetionHelper::Start($competetion->id);
        CompetetionHelper::End($competetion->id);
        $article = Article::findOrFail($article);
        $group = AgeGroup::findOrFail($group);
        $added = Result::where('competetions_id',$competetion->id)
                         ->where('user_id',$article->user_id)
                         ->where('article_id',$article->id)
                         ->where('age_group_id',$group->id)
                         ->first();
        if (!is_null($added)){
           return back()->with('error','Already Added to Winning List!');
        }else{
            $data = [
                'competetions_id' => $competetion->id,
                'user_id' => $article->user_id,
                'article_id' => $article->id,
                'age_group_id' => $group->id,
            ];
            if (Result::create($data)) {
                return back()->with('success','Successfully Added to Winning List');
            }else{
                return back()->with('error','Something Went Wrong!');
            }
        }
    }

    public function RemoveFromWinningList($competetion,$article)
    {
        $competetion = Competetion::findOrFail($competetion);
        $article = Article::findOrFail($article);
        CompetetionHelper::Start($competetion->id);
        CompetetionHelper::End($competetion->id);
        $added = Result::where('competetions_id',$competetion->id)
                         ->where('user_id',$article->user_id)
                         ->where('article_id',$article->id)
                         ->first();
        if (!is_null($added)){
           if ($added->delete()) {
               return back()->with('success','Successfully Removed From Winning List!');
           }else{
            return back()->with('error','Something Went Wrong!');
           }
        }else{
            return back()->with('error','Something Went Wrong!');
        }
    }

    public function ViewWinningList($group,$competetion)
    {
        $competetion = Competetion::findOrFail($competetion);
        CompetetionHelper::Start($competetion->id);
        CompetetionHelper::End($competetion->id);
        $winninglist = Result::where('competetions_id',$competetion->id)
                                ->where('age_group_id',$group)
                               ->pluck('article_id')
                               ->toArray();
        $articles = Article::find($winninglist);
        return view('Admin.Dashboard.Competetions.Past.CompileResults.Table.WinningList')
               ->with([
                'group' => $group,
                'competetion' => $competetion,
                'articles' => $articles,
               ]);
    }

    public function MakePositionPrize(Request $request,$competetion,$article,$group)
    {
        $competetion = Competetion::findOrFail($competetion);
        CompetetionHelper::Start($competetion->id);
        CompetetionHelper::End($competetion->id);
        $article = Article::findOrFail($article);
        $group = AgeGroup::findOrFail($group);
        $rules = [
            'position.required' => 'The Position is Required.',
            'position.numeric' => 'The Position Should be in Numeric Form.',

            'prize_amount.required' => 'The Prize Amount is Required.',
            'prize_amount.numeric' => 'The Prize Amount Should be in Numeric Form.',
        ];
        $request->validate([
            'position' => 'required|numeric',
            'prize_amount' => 'required|numeric',
        ],$rules);
        $result = Result::where('competetions_id',$competetion->id)
                          ->where('article_id',$article->id)
                          ->where('age_group_id',$group->id)
                          ->first();
        if (!is_null($result)){
            $data = [
               'position' => $request->position,
               'prize' => $request->prize_amount, 
            ];
            if ($result->update($data)){
                return back()->with('success','Position and Prize has been Set Successfully');
            }else{
                return back()->with('error','Another Article has the Same Position!');
            }
        }else{
            return back()->with('error','Another Article has the Same Position!');
        }
    }

    public function AnnounceResult($id)
    {
        if (CompetetionHelper::ResultHasBeenAnnounced($id)) {
            return back()->with('error','Result has been Announced Already!');
        }else{
            if (CompetetionHelper::AnnounceResult($id)) {
                return back()->with('success','Result has been Announced Successfully!');
            }else{
               return back()->with('error','Something Went Wrong!'); 
            }
        }
    }

    public function RecompileResult($id)
    {
        if (CompetetionHelper::ResultHasBeenAnnounced($id)) {
            if (CompetetionHelper::RecompileResult($id)) {
                return back()->with('success','Result has been Hidden and Ready to Recompile!');
            }else{
               return back()->with('error','Something Went Wrong!'); 
            }
        }else{
            return back()->with('error','Something Went Wrong!'); 
        }
    }

    public function HideResult($id)
    {
        if (CompetetionHelper::ResultHasBeenAnnounced($id)) {
            if (CompetetionHelper::HideResult($id)) {
                return back()->with('success','Result has been Hidden and Ready to Recompile!');
            }else{
               return back()->with('error','Something Went Wrong!'); 
            }
        }else{
            return back()->with('error','Something Went Wrong!'); 
        }
    }

    public function CompetetionResultDate($competetion)
    {
        $competetion = Competetion::findOrFail($competetion);
        CompetetionHelper::Start($competetion->id);
        CompetetionHelper::End($competetion->id);
        return view('Admin.Dashboard.Competetions.CompileResults.ResultDate.index',compact('competetion'));
    }

    public function SaveCompetetionResultDate(Request $request, $competetion)
    {
        $competetion = Competetion::findOrFail($competetion);
        $request->validate([
            'result_announcing_date' => 'required|date|date_format:Y-m-d|after_or_equal:'.date('Y-m-d'),
            'result_description' => 'nullable|string',
        ]);
        CompetetionHelper::Start($competetion->id);
        CompetetionHelper::End($competetion->id);
        if (CompetetionHelper::IsEnded($competetion->id)) {
            if ($competetion->update(['result_announcing_date' => $request->result_announcing_date,'result_description' => $request->result_description])) {
                return back()->with('success','Result Date has been Set Successfully'); 
            }else{
                return back()->with('error','Something Went Wrong!'); 
            }
        }else{
            return back()->with('error','The Competetion is not ended yet!'); 
        }
    }
}
