<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jenis_mobil_model extends Model
{
  protected $table="jenis_mobil";
  protected $primaryKey="id_jm";
  public $timestamps= false;
  protected $fillable = [
    'nama_jenis'
  ];
}
