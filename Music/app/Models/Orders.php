<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Orders extends Model
{
    use HasFactory;
    protected $fillable = ['userID', 'roomID', 'time', 'date', 'checkout'];
    protected static function booted()
    {
        static::creating(function ($order) {
            // Gán thời gian hiện tại nếu cột 'time' chưa có giá trị
            $order->time = $order->time ?? Carbon::now()->format('H:i:s');

            // Gán ngày hiện tại nếu cột 'date' chưa có giá trị
            $order->date = $order->date ?? Carbon::now()->format('Y-m-d');
        });
    }
    public $timestamps = false;
}
