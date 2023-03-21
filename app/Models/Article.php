<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ["ma_tloai","tieude","ten_bhat","tomtat","noidung","hinhanh"];
    
    // protected $attributes = ["noidung"=>null,"hinhanh"=>null];
}
