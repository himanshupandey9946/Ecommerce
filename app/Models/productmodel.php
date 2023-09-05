<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productmodel extends Model
{
    use HasFactory;
    protected $table = 'product';

    static public function checkSlug($slug){

        return self::where('slug','=',$slug)->count();

    }

}
