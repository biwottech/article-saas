<?php
namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class AgeGroup extends Model
{

    protected $table = "age_group";

    protected $fillable = ['group_from','group_to','description'];

    public function Students()
    {
        return $this->hasMany(User::class);
    }
}
