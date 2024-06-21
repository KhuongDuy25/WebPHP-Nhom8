<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vouchers extends Model
{
    protected $table = 'Vouchers';
    protected $fillable = ['code','sale'];

    public $timestamps = true;

    public function Orders(){
        return $this->hasMany(Orders::class);
    }
    
} 

?>
