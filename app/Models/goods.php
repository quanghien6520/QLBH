<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class goods extends Model
{
    use HasFactory;
    protected $table = 'goods';

    protected $fillable = ['barcode','name','price','unit','type','provider','period'];
}
