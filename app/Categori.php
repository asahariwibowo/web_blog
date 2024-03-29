<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Categori extends Model
{
    protected $table='table_categoris';
    protected $guarded=['id']; /**tidak perlu dimasukkan masuk sendiri */

    public function setSlugAttribute($value)  /**cara menginput slug dari table categori, menambahkan - secara otomatis */
    {
        $this->attributes['slug'] = Str::slug($value,'-');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function Artikel()
    {
        return $this->hasMany(\App\Artikel::class,'categoris_id','id');
    }
}
