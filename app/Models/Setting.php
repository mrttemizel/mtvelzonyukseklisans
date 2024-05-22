<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function getDuyuru(){
        $locale = app()->getLocale();
        $property = "duyuru_{$locale}";
        return $this->{$property};
    }
}
