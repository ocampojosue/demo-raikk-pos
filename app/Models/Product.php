<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;
    Protected $fillable = ['name', 'barcode', 'cost', 'price', 'stock', 'alerts', 'image', 'category_id'];
    
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function getImagenAttribute(){
        // if($this->image == null)
        // return 'noimg.jpg';
        // if (file_exists('storage/products/'. $this->image))
        //     return $this->image;

        // if($this->image != null)
        //     return (file_exists('storage/products/'. $this->image) ? $this->image :'nomig.jpg');
        // else
        //     return 'noimg.jpg';
        if($this->image == null){
            return 'noimg.jpg';
        }
        if (file_exists('storage/products/' . $this->image)){
            return $this->image;
        }else {
            return 'noimg.jpg';
        }
    }
}
