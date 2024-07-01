<?php

namespace App\Http\Controllers\Reader;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Helpers\Admin\Article as ArticleHelper;

class ReaderDashboardController extends Controller
{
    public function __construct()
    {
    	return $this->middleware(['auth','reader']);
    }

	public function Dashboard()
	{
        $articles = ArticleHelper::ViewPublished();
        $paginate = 5;
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
        $articles = $articles->paginate($paginate)->appends($queries);
		return view('Reader.Dashboard.index',compact('articles'));
	}
}
