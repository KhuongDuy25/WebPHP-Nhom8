<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admins extends Model
{
    protected $table = 'Admins';
    protected $fillable = ['id'];
    
    public $timestamps = false;

    public function Users(){
        return $this->belongsTo(Users::class);
    }
}

?>
