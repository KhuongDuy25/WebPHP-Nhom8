<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orderstatus extends Model
{
    protected $table = 'Orderstatus';
    protected $fillable = ['status'];
    
    public $timestamps = false;
    
    public function Orders(){
        return $this->hasMany(Orders::class);
    }
} 

?>
