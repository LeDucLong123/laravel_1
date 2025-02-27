<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\Rooms;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Orders::join('users', 'orders.userID', '=', 'users.id')
            ->join('rooms', 'orders.roomID', '=', 'rooms.id')
            ->select('orders.id', 'orders.userID', 'orders.roomID', 'users.userName', 'rooms.roomName', 'rooms.roomStatus', 'orders.checkout')
            ->orderBy('orders.id', 'desc')
            ->get();
        // $orders = Orders::all();
        return view('order.index', compact('orders'));
    }
    public function detail($id)
    {
        $order = Orders::join('users', 'orders.userID', '=', 'users.id')
            ->join('rooms', 'orders.roomID', '=', 'rooms.id')
            ->select('orders.id', 'orders.userID', 'orders.roomID', 'users.userName', 'rooms.roomName', 'orders.time', 'orders.date')
            ->where('orders.id', '=', $id)
            ->first();
        return view('order.detail', compact('order'));
    }
    public function checkout($idRoom, $idOrder)
    {
        $room = Rooms::find($idRoom);
        $room->roomStatus = 0;
        $room->save();

        $order = Orders::find($idOrder);
        $order->checkout = 1;
        $order->save();

        return redirect()->back()->with('crud', 'Check Out');
    }
}
