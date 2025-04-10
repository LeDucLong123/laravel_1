<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    use HasFactory;
    protected $fillable = [
        'roomName',
        'roomStatus',
        'roomCapacity'
    ];
    public $timestamps = false;
}
