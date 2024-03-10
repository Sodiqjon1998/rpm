<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $table = 'slider';

    protected $fillable = ['img', 'text', 'sub_title', 'title', 'text', 'status', 'created_at', 'updated_at'];
}
