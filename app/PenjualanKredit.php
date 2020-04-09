<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenjualanKredit extends Model
{
    protected $table = 'penjualan_kredits';
    protected $dateFormat = 'd/m/Y';
    public $timestamps = false;
}
