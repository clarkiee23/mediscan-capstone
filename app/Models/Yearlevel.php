<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;




class Yearlevel extends Model
{
    use HasFactory;
    protected $table = 'tbl_yearlevels';

    public function user(){
        return $this->hasMany(Users::class, "yearlevel_id");
    }
}
