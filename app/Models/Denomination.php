<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denomination extends Model
{
    use HasFactory;
    protected $fillable = ['type', 'value', 'image'];

    public function getImagenAttribute(){
        // if($this->image == null)
        // return 'noimg.jpg';
        // if (file_exists('storage/denominations/'. $this->image))
        //     return $this->image;

        // if($this->image != null)
        //     return (file_exists('storage/denominations/'. $this->image) ? $this->image :'noimg.jpg');
        // else
        //     return 'denominations/' .$this->image.'noimg.jpg';
        if($this->image == null){
            return 'noimg.jpg';
        }
        if (file_exists('storage/denominations/' . $this->image)){
            return $this->image;
        }else {
            return 'noimg.jpg';
        }
        
    }
}
