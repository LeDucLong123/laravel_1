<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rooms;
use App\Models\Orders;
use Illuminate\Support\Facades\Auth;

class RoomsController extends Controller
{
    public function index()
    {
        $rooms = Rooms::all();
        return view('room.index', compact('rooms'));
    }
    public function create()
    {
        return view('room.create');
    }
    public function add(Request $request)
    {
        $sta = $request->input('status');
        if (empty($sta) || $sta == '2') {
            $sta = 0;
        }
        Rooms::create([
            'roomName' => $request->input('name'),
            'roomStatus' => $sta,
            'roomCapacity' => $request->input('capacity')
        ]);
        return redirect()->route('room.index')->with('crud', 'Add');
    }
    public function edit($id)
    {
        $room = Rooms::find($id);
        return view('room.edit', compact('room'));
    }
    public function updata($id, Request $request)
    {
        $room = Rooms::find($id);
        $room->roomName = $request->input('name');
        $room->roomCapacity = $request->input('capacity');
        //nếu chọn status thì mới đổi
        $sta = $request->input('status');
        if (!empty($sta)) {
            $room->roomStatus = ($sta == '1') ? '1' : '0';
        }
        $room->save();

        return redirect()->route('room.index')->with('crud', 'Updata');
    }
    public function delete($id)
    {
        Rooms::find($id)->delete();
        return redirect()->route('room.index')->with('crud', 'Delete');
    }
    public function order($id)
    {
        // Tìm phòng theo ID
        $room = Rooms::find($id);

        //Nếu phòng có người thì không được đặt
        if ($room->roomStatus == '1') {
            return redirect()->back()->with('err', 'Occupied');
        }

        //Đặt phòng lưu data vào order
        $user = Auth::user();
        if (!empty($user)) {
            Orders::create([
                'userID' => $user->id,
                'roomID' => $id,
                'checkout' => 0,
            ]);
            $room->roomStatus = 1;
            $room->save();
            return redirect()->back()->with('crud', 'Occupied');
        } else {
            return redirect()->back()->with('err', 'Unauthenticated');
        }
    }
}
