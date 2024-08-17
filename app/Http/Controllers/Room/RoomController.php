<?php

namespace App\Http\Controllers\Room;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RoomController extends Controller
{
    public function index(): View
    {

        $rooms = Room::with('users', 'user')->get()->all();


            return view('dashboard', ['rooms' => $rooms]); 
    }

    public function show(Room $room): View
    {
        $single_room = Room::with('users', 'user', 'message')->find($room->id);

        return view('room.show', [ 'room' => $single_room, 'room_id' => $room->id]);
    }
}
