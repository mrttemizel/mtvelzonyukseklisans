<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function getBolum(){
        return $this->hasOne(Bolumler::class,'id','bolum_id');
    }
    use HasFactory;

    protected $guarded = [];
}
