<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sell extends Model
{
    use HasFactory;
    protected $table = 'sell';

    protected $fillable = ['id_goods','id_user','amount','id_bill'];

    public function user()
    {
        return $this->belongsTo(User::class,'id_user','id');
    }

    public function goods()
    {
        return $this->belongsTo(goods::class,'id_goods','id');
    }
}
