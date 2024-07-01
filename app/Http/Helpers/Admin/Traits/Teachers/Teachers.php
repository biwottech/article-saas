<?php 
namespace App\Http\Helpers\Admin\Traits\Teachers;
use App\User;

trait Teachers
{
	/*All Teachers*/
	public static function All()
	{
		if (!($teachers = User::withTrashed()
			->where('role','Teacher')
			->where('role_id',3)
			->where('type','Reader')
			->get())->isEmpty()) {
			return $teachers;
		}else{
			return false;
		}
	}

	/*Count All Teachers*/
	public static function CountAll()
	{
		if ($teachers = self::All()) {
			return $teachers->count();
		}else{
			return 0;
		}
	}


	/*Find a Specific Teachers*/
	public static function FindSpecific($teacher)
	{
		if ($teachers = self::All()) {
			if (!is_null($teacher = $teachers->find($teacher))) {
				return $teacher;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	/*Count Blocked Teachers*/
	public static function CountBlocked()
	{
		if (!($teachers = User::onlyTrashed()
			->where('role','Teacher')
			->where('role_id',3)
			->where('type','Reader')
			->get())->isEmpty()) {
			return $teachers->count();
		}else{
			return 0;
		}
	}

	/*Count Active Teachers*/
	public static function CountActive()
	{
		if (!($teachers = User::where('role','Teacher')
			->where('role_id',3)
			->where('type','Reader')
			->get())->isEmpty()) {
			return $teachers->count();
		}else{
			return 0;
		}
	}
}
