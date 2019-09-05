<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table='artikels';
    protected $guarded=[];

	public function kategori(){
    	return $this->belongsTo(Kategori::class);
    }

    public function getRouteKeyName(){
    	return 'judul';
    }

}
