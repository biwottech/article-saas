<?php 
namespace App\Http\Helpers\Admin\Traits\Articles;

use App\Article;
use Illuminate\Support\Facades\Auth;

trait Articles

{
	/*All Articles*/
	public static function FetchAll()
	{
		$articles = Article::withTrashed()->get();
		if (!($articles)->isEmpty()) {
			return $articles;
		}else{
			return false;
		}
	}

	/*Count All Articles*/
	public static function CountAll()
	{
		if ($articles = self::FetchAll()) {
			return $articles->count();
		}else{
			return false;
		}
	}

	/*Count All Banned Articles*/
	public static function CountBanned()
	{
		$articles = Article::withTrashed()->where('status','BANNED')->get();
		if (!($articles)->isEmpty()) {
			return $articles->count();
		}else{
			return 0;
		}
	}

	/*View All Published Articles*/
	public static function ViewPublished()
	{
		$articles = Article::withTrashed()->where('visibility','PUBLISHED');
		$articles = $articles->where('status','!=','BANNED');
		if (!($articles->get())->isEmpty()) {
			return $articles;
		}else{
			return false;
		}
	}

	/*Count All Published Articles*/
	public static function CountPublished()
	{
		$articles = Article::withTrashed()->where('visibility','PUBLISHED');
		$articles = $articles->where('status','!=','BANNED')->get();
		if (!($articles)->isEmpty()) {
			return $articles->count();
		}else{
			return 0;
		}
	}

	/*Count All Archived Articles*/
	public static function CountArchived()
	{
		$articles = Article::withTrashed()->where('visibility','ARCHIVED');
		$articles = $articles->where('status','!=','BANNED')->get();
		if (!($articles)->isEmpty()) {
			return $articles->count();
		}else{
			return 0;
		}
	}

	/*All Articles with Pagination*/
	public static function FetchAllWithPagination($number)
	{
		$articles = Article::withTrashed()->paginate($number);
		if (!($articles)->isEmpty()) {
			return $articles;
		}else{
			return false;
		}
	}

	/*All Articles with Pagination*/
	public static function Views($article)
	{
		if (!is_null($article = Article::find($article))) {
			if (!is_null($views = $article->views)) {
				if ($views > 0) {
					return $views;
				}else{
					return 0;
				}
			}else{
				return 0;
			}
		}else{
			return false;
		}
	}

	/*Ban an Article*/
	public static function BanArticle($article)
	{
		$article = Article::find($article);
		if (!is_null($article)) {
			if ($article->update(['status' => 'BANNED','visibility' => 'ARCHIVED'])) {
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	/*UnBan an Article*/
	public static function UnBanArticle($article)
	{
		$article = Article::find($article);
		if (!is_null($article)) {
			if ($article->update(['status' => 'ACTIVE'])) {
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	/*Publish  an Article*/
	public static function PublishArticle($article)
	{
		$article = Article::find($article);
		if (!is_null($article)) {
			if ($article->status === "ACTIVE") {
				if ($article->update(['visibility' => 'PUBLISHED'])) {
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	/*Archive  an Article*/
	public static function ArchiveArticle($article)
	{
		$article = Article::find($article);
		if (!is_null($article)) {
			if ($article->status === "ACTIVE") {
				if ($article->update(['visibility' => 'ARCHIVED'])) {
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	/*Article Is Banned/Unanned*/
	public static function IsBanned($article)
	{
		$article = Article::find($article);
		if (!is_null($article)) {
			if ($article->status === "BANNED") {
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	/*Article Is Published/Archived*/
	public static function IsPublished($article)
	{
		$article = Article::find($article);
		if (!is_null($article)) {
			if ($article->visibility === "PUBLISHED") {
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
}
