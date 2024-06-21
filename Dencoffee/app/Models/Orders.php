<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'Orders';
    protected $fillable = ['addr', 'orderstatus_id'];
    
    public $timestamps = true;
    
    public function Users(){
        return $this->belongsTo(Users::class);
    }

    public function Products(){
        return $this->belongsToMany(Products::class, 'Orderdetail')->withPivot('quantity');
    }

    public function Vouchers(){
        return $this->belongsTo(Vouchers::class);
    }

    public function Orderstatus(){
        return $this->belongsTo(Orderstatus::class);
    }
} 

?>
