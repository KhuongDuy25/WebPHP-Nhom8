<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedbacks extends Model
{
    protected $table = 'Feedbacks';
    protected $fillable = ['email','text'];

    public $timestamps = true;

    public function Products(){
        return $this->belongsTo(Products::class);
    }
    
} 

?>
