<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class category extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'categories';

    public function categorysmall(){
        return $this->hasMany(category::class, 'parent_id');
    }

    public function productitem(){
      return  $this->hasMany(product::class, 'category_id');
    }
}
