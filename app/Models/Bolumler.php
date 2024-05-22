<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bolumler extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getBolumlerAttribute(){
        $locale = app()->getLocale();
        $property = "bolumler_{$locale}";
        return $this->{$property};
    }
}
