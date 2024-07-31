<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modaltable extends Model
{
    use HasFactory;

    protected $table = 'modaltables';
    protected $fillable = ['name', 'email'];
}
