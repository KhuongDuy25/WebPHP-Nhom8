<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $table = 'Images';
    protected $fillable = ['products_id','url'];
    
    public $timestamps = false;
} 

?>
