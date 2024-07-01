<?php 
namespace App\Http\Helpers\Admin\Traits\AgeGroups;

use App\User;
use App\AgeGroup;

trait AgeGroups{
	
	/*All AgeGroups*/
	public static function All()
	{
		if (!is_null($group = AgeGroup::all())) {
			return $group;
		}else{
			return false;
		}
	}

	/*Count All AgeGroups*/
	public static function CountAll()
	{
		if ($group = self::All()) {
			return $group->count();
		}else{
			return 0;
		}
	}

	/*Total Students in a Specific*/
	public static function TotalStudentsInSpecific($group)
	{
		if (!($students = User::withTrashed()->where('age_group_id',$group)->get())->isEmpty()) {
			return $students;
		}else{
			return true;
		}
	}

	/*Total Active Students in a Specific*/
	public static function CountActiveStudentsInSpecific($group)
	{
		if (!($students = User::where('age_group_id',$group)->get())->isEmpty()) {
			return $students->count();
		}else{
			return 0;
		}
	}

	/*Total Blocked Students in a Specific*/
	public static function CountBlockedStudentsInSpecific($group)
	{
		if (!($students = User::onlyTrashed()->where('age_group_id',$group)->get())->isEmpty()) {
			return $students->count();
		}else{
			return 0;
		}
	}

	/*Count Students in a Specific*/
	public static function CountStudentsInSpecific($group)
	{
		if ($students = self::TotalStudentsInSpecific($group)) {
			return $students->count();
		}else{
			return 0;
		}
	}
}
