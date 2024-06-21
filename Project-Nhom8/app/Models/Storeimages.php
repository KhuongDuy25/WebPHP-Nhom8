<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Storeimages extends Model
{
    protected $table = 'Storeimages';
    protected $fillable = ['url'];
    
    public $timestamps = false;
} 

?>
