<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permisstion extends Model
{
    protected $guarded=[];
    use HasFactory;

    public function permisstionchilr(){

        return $this->hasMany(Permisstion::class, 'parent_id');
    }


}
