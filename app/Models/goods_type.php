<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class goods_type extends Model
{
    use HasFactory;

    protected $table = 'goods_type';

    protected $fillable = ['name'];
}
