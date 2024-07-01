<?php
namespace App\Http\Helpers\Admin\Traits\Settings;
use App\WebsiteSetting;

trait Settings{

	/*If Settings Exist*/
	public static function Exist()
	{
		if (!is_null($settings = WebsiteSetting::first())) {
			return $settings;
		}else{
			return false;
		}
	}

	/*Website Info*/
	public static function Website()
	{
		if ($settings = self::Exist()) {
			return $settings;
		}else{
			return false;
		}
	}

	/*Has Logo Image*/
	public static function HasLogoImage()
	{
		if ($settings = self::Exist()) {
			if (!is_null($settings->logo)) {
				return $settings->logo;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	/*Has Text Logo*/
	public static function HasTextLogo()
	{
		if ($settings = self::Exist()) {
			if (!is_null($settings->text_logo)) {
				return $settings->text_logo;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	/*Student Can Submit Articles After Competetion Starts*/
	public static function CanSubmitArticlesAfter()
	{
		return "hello";
	}

	/*Student Can Update Article After Competetion Starts*/
	public static function CanUpdateArticleAfter($article)
	{
		return $article;
	}
}
