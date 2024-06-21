<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'Users';
    protected $fillable = ['username', 'password'];
    
    public $timestamps = false;

    public function Orders(){
        return $this->hasMany(Orders::class);
    }

    public function Admins(){
        return $this->hasOne(Admins::class);
    }
}

?>
