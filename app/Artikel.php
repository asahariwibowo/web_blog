<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = "table_articles";
    protected $guarded = ['id'];

    public function Kategori() /**ini diapke untuk memanggil data relasi */
    {
        return $this->belongsTo(\App\Categori::class,'categoris_id','id');
    }

    public function getRouteKeyName()
    {
        return 'judul';
    }
}
