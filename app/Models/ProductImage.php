<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    protected $table = 'product_image';

    public function getLogo(){
        if( !empty($this->image_name) && file_exists('public/uploads/productimage'.$this->image_name))
        {
           
            return url('public/uploads/productimage'.$this->image_name);
        }
        else{
            return "";
        }
    }


}
