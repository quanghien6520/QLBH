<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buy extends Model
{
    use HasFactory;
    protected $table = 'buy';

    protected $fillable = ['id_goods','id_user','amount','id_bill','date_made'];
}
