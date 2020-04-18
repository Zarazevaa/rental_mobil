<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pelanggan_model extends Model
{
  protected $table="pelanggan";
  protected $primaryKey="id_pelanggan";
  public $timestamps= false;
  protected $fillable = [
    'nama_pelanggan', 'alamat', 'telp', "no_ktp", "foto"
  ];
}
