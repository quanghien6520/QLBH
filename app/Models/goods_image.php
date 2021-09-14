<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class goods_image extends Model
{
    use HasFactory;
    protected $table = 'goods_images';

    protected $fillable = ['id_goods','path','name'];
}
