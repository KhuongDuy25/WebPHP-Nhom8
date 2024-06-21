<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Products;

class Promotions extends Model
{
    protected $table = 'Promotions';
    protected $fillable = ['code', 'sale_percent'];
    
    public $timestamps = true;
    
    public function Products(){
        return $this->belongsTo(Products::class);
    }
} 

?>
