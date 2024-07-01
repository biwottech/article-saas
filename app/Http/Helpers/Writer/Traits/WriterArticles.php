<?php 
namespace App\Http\Helpers\Writer\Traits;
use App\User;
use App\Article;
use Illuminate\Support\Facades\Auth;

trait WriterArticles
{
	/*If is a Valid Student*/
	public static function IsValidStudent($user)
	{
		if (!is_null($student = User::find($user))) {
			if ($student->role_id === 2) {
				if ($student->type === "Writer") {
					return $student;
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

	/*All Articles*/
	public static function AllArticles()
	{
		if ($student = self::IsValidStudent(Auth::user()->id)) {
			return Article::withTrashed()->where('user_id',$student->id);
		}else{
			return false;
		}
	}

	/*All Articles*/
	public static function FindArticle($article)
	{
		if ($articles = self::AllArticles()) {
			if (!is_null($find = $articles->find($article))) {
				return $find;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	/*Count All Articles*/
	public static function CountAll()
	{
		if ($student = self::IsValidStudent(Auth::user()->id)) {
			return Article::withTrashed()->where('user_id',$student->id)->count();
		}else{
			return 0;
		}
	}

	/*Count All Articles*/
	public static function CountArticlesWithPlan($plan)
	{
		if ($student = self::IsValidStudent(Auth::user()->id)) {
			return Article::withTrashed()->where('user_id',$student->id)
			->where('user_id',$student->id)->count();
		}else{
			return 0;
		}
	}


	/*Count All Banned Articles*/
	public static function CountBanned()
	{
		$articles = self::AllArticles()->where('status','BANNED')->get();
		if (!($articles)->isEmpty()) {
			return $articles->count();
		}else{
			return 0;
		}
	}

	/*Count All Published Articles*/
	public static function CountPublished()
	{
		$articles = self::AllArticles()->where('visibility','PUBLISHED');
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
		$articles = self::AllArticles()->where('visibility','ARCHIVED');
		$articles = $articles->where('status','!=','BANNED')->get();
		if (!($articles)->isEmpty()) {
			return $articles->count();
		}else{
			return 0;
		}
	}

	/*Publish an Article*/
	public static function PublishArticle($article)
	{
		if ($article = self::FindArticle($article)) {
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

	/*Archive an Article*/
	public static function ArchiveArticle($article)
	{
		if ($article = self::FindArticle($article)) {
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
}
