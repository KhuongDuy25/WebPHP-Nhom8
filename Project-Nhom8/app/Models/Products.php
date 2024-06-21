<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Promotions;

class Products extends Model
{
    protected $table = 'Products';
    protected $fillable = ['name','descript','producttype_id','price','main_image'];
    
    public $timestamps = true;

    public function Producttype(){
        return $this->belongsTo(Producttype::class);
    }

    public function Promotions(){
        return $this->hasMany(Promotions::class);
    }

    public function Images(){
        return $this->hasMany(Images::class);
    }

    public function Orders(){
        return $this->belongsToMany(Orders::class, 'Orderdetail')->withPivot('quantity');
    }
        
} 

?>
