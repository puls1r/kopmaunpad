<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenjualanTunai extends Model
{
    protected $table = 'penjualan_tunais';
    protected $dateFormat = 'd/m/Y';
    public $timestamps = false;
}
