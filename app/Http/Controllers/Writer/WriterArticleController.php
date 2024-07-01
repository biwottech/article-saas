<?php
namespace App\Http\Controllers\Writer;
use App\User;
use App\Article;
use App\ArticleLike;
use App\ReportArticle;
use App\ArticleDislike;
use Illuminate\Http\Request;
use App\Http\Helpers\UserHelper;
use App\Http\Helpers\Writer\Writer;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Helpers\Article as ArticleHelper;

class WriterArticleController extends Controller
{

    public function __construct()
    {
        return $this->middleware(['auth','writer']);
    }
    /*begin::My Articles*/
    public function AllArticles()
    {   
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
    	return view('Writer.Dashboard.Articles.index',compact('articles'));
    }

    public function WriterReadArticle($id)
    {
        if ($article = Writer::ReadOwnArticle($id)){
            $other = Writer::OwnOtherArticles($id);
            return view('Writer.Dashboard.Articles.Read.index')
                   ->with([
                    'article' => $article,
                    'other' => $other,
                   ]);
        }else{
            return back()->with('error','Something Went Wrong!');
        }
    }

    public function WriterWriteArticle()
    {
        if ($subscription = Writer::hasAnyActiveSubscription(Auth::user()->id)) {

            $articles = Writer::CountArticlesWithPlan($subscription->plan_id);
            $limit = Writer::PlanWritingLimit($subscription->plan_id);

            if ($articles < $limit) {
                return view('Writer.Dashboard.Articles.Create.index');
            }else{
                return back()->with('error','Sorry you can only write '.$limit.' Articles.');
            }
        }else{
            return back()->with('error',"Sorry You don't have any Active Subscription!");
        }
    }

    public function WriterSavePublish(Request $request)
    {
        if ($subscription = Writer::hasAnyActiveSubscription(Auth::user()->id)) {
            $articles = Writer::CountArticlesWithPlan($subscription->plan_id);
            $limit = Writer::PlanWritingLimit($subscription->plan_id);
            if ($articles < $limit) {
            $rules = [
                'title.required' => 'Title Can not be Empty',
                'content.required' => 'Article Can not be Empty',
                'title.unique' => 'Article already Exists with this Title.Please Write Something New',
                'content.unique' => 'Article already Exists with this Content.Please Write Something New',
                'featured-image.image' => 'Featured Image should be an Image', 
                'featured-image.mimes' => 'Featured Image should be JPG,JPEG,PNG', 
            ];
            $request->validate([
                'title' => 'required|string|unique:articles',
                'content' => 'required|string|unique:articles',
                'featured-image' => 'nullable|image|mimes:jpg,jpeg,png',
            ],$rules);
            if ($request->file('featured-image')) {

                $imageName = md5(Auth::user()->id.time().$request->file('featured-image')->getClientOriginalName()).$request->file('featured-image')->getClientOriginalName();  
                $request->file('featured-image')->move(public_path('Articles/FeatureImages/'), $imageName);
                $featuredImage = $imageName;
            }else{
                $featuredImage = null;
            }
            $data = [
                'user_id' => Auth::user()->id,
                'plan_id' => $subscription->plan_id,
                'status' => "ACTIVE",
                'visibility' => "PUBLISHED",
                'title' => $request->title,
                'content' => $request->content,
                'feature_image' => $featuredImage,
            ];
            if (Article::create($data)) {
                return redirect()->route('WriterArticles')->with('success',"Article Written & Published Successfully!");
            }else{
                return back()->with('error',"Something Went Wrong!");
                }       
            }else{
                return back()->with('error','Sorry you can only write '.$limit.' Articles.');
            }
        }else{
            return back()->with('error',"Sorry You don't have any Active Subscription!");
        }
    }

    public function WriterSaveArchive(Request $request)
    {
        if ($subscription = Writer::hasAnyActiveSubscription(Auth::user()->id)) {
            $articles = Writer::CountArticlesWithPlan($subscription->plan_id);
            $limit = Writer::PlanWritingLimit($subscription->plan_id);
            if ($articles < $limit) {
            $rules = [
                'title.required' => 'Title Can not be Empty',
                'content.required' => 'Article Can not be Empty',
                'title.unique' => 'Article already Exists with this Title.Please Write Something New',
                'content.unique' => 'Article already Exists with this Content.Please Write Something New',
                'featured-image.image' => 'Featured Image should be an Image', 
                'featured-image.mimes' => 'Featured Image should be JPG,JPEG,PNG', 
            ];
            $request->validate([
                'title' => 'required|string|unique:articles',
                'content' => 'required|string|unique:articles',
                'featured-image' => 'nullable|image|mimes:jpg,jpeg,png',
            ],$rules);
            if ($request->file('featured-image')) {

                $imageName = time().$request->file('featured-image')->getClientOriginalName();  
                $request->file('featured-image')->move(public_path('Articles/'.Auth::user()->id.'/FeatureImages/'), $imageName);
                $featuredImage = $imageName;
            }else{
                $featuredImage = null;
            }
            $data = [
                'user_id' => Auth::user()->id,
                'plan_id' => $subscription->plan_id,
                'status' => "ACTIVE",
                'visibility' => "ARCHIVED",
                'title' => $request->title,
                'content' => $request->content,
                'feature_image' => $featuredImage,
            ];
            if (Article::create($data)) {
                return redirect()->route('WriterArticles')->with('success',"Article Written & Archived Successfully!");
            }else{
                return back()->with('error',"Something Went Wrong!");
                }       
            }else{
                return back()->with('error','Sorry you can only write '.$limit.' Articles.');
            }
        }else{
            return back()->with('error',"Sorry You don't have any Active Subscription!");
        }
    }

    public function WriterEditArticle($id)
    {
        if($article = Writer::FindArticle($id)){
            return view('Writer.Dashboard.Articles.Update.index',compact('article'));
        }else{
            return back()->with('error','Something Went Wrong!');
        } 
    }

    public function WriterUpdateArticle(Request $request, $id)
    {
        $rules = [
            'title.required' => 'Title Can not be Empty',
            'content.required' => 'Article Can not be Empty',
            'title.unique' => 'Article already Exists with this Title.Please Write Something New',
            'content.unique' => 'Article already Exists with this Content.Please Write Something New',
        ];
        $request->validate([
            'title' => 'required|string|unique:articles,title,'.$id,
            'content' => 'required|string|unique:articles,content,'.$id,
        ],$rules);

        $article = Article::findOrFail($id);

        $data = [
            'title' => $request->title,
            'content' => $request->content,
        ];

        if (Writer::UpdateArticle($article->id,$data)) {
            return back()->with('success','Article Updated Successfully!');
        }else{
            return back()->with('error','Something Went Wrong!');
        }
    }

    public function WriterPublishArticle($article)
    {
        if (Writer::PublishArticle($article)) {
            return back()->with('success','Article Published Successfully!');
        }else{
            return back()->with('error','Something Went Wrong!');
        }
    }

    public function WriterArchiveArticle($article)
    {
        if (Writer::ArchiveArticle($article)) {
            return back()->with('success','Article Archived Successfully!');
        }else{
            return back()->with('error','Something Went Wrong!');
        }
    }

    public function WriterDeleteArticle($article)
    {
        if($article = Writer::FindArticle($article)){
            if ($article->forceDelete()) {
                 return back()->with('success','Deleted Successfully!'); 
            }else{
                return back()->with('error','Something Went Wrong!');   
            }
        }else{
            return back()->with('error','Something Went Wrong!');
        } 
    }

    public function WriterRateArticle(Request $request,$ratings,$article_id)
    {
            $request->validate([
                'ratings' => 'nullable|integer|min:1|max:5',
            ]);

        if (!is_null( $artict = Article::find($article_id))) {
        if (Writer::hasJoined()) {
            if (Writer::RatingLimit()) {
            $user = User::find(Auth::user()->id);
            $rating = $artict->rating([
                'title' => 'This is a test title',
                'body' => 'And we will add some shit here',
                'customer_service_rating' => 5,
                'quality_rating' => 5,
                'friendly_rating' => 5,
                'pricing_rating' => 5,
                'rating' => $request->ratings,
                'competetions_id' => Writer::CompetetionIs()->id,
                'user_id' => Auth::user()->id,
                'recommend' => 'Yes',
                'approved' => true, // This is optional and defaults to false
                ], $user);

            return $rating->rating;
            }else{
            return "Something Went Wrong!";
        }
        }else{
            return "Something Went Wrong!";
        }
        }else{
            return "Something Went Wrong!";
        }

    }
}
