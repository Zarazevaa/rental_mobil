<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mobil_model extends Model
{
  protected $table="mobil";
  protected $primaryKey="id_mobil";
  public $timestamps= false;
  protected $fillable = [
    'plat_nomor', 'merk', "foto", "keterangan"
  ];
}
