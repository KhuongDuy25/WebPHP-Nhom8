<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producttype extends Model
{
    protected $table = 'Producttype';
    protected $fillable = ['type'];

    public $timestamps = false;

    public function Products(){
        return $this->hasMany(Products::class);
    }
    
} 

?>
