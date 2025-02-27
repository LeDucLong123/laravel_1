<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable
{
    use HasFactory;

    // // Đặt tên bảng (tùy chọn, nếu tên bảng là 'users' thì Laravel sẽ tự động sử dụng)
    protected $table = 'users';

    // Nếu bạn muốn chỉ định các cột có thể được gán (fillable)
    protected $fillable = [
        'userName',
        'userAccount',
        'userPassword',
        'userRole'
    ];

    // Nếu bạn không muốn Laravel tự động thêm cột 'created_at' và 'updated_at'
    public $timestamps = false;

    public function getAuthPassword()
    {
        return $this->userPassword; // Trả về cột mật khẩu (userPassword)
    }
    // Nếu không muốn cho phép tất cả các cột được gán (mass assignable) thì có thể dùng $guarded
    // protected $guarded = [];



}
