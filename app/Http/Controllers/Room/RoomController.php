<?php

namespace App\Http\Controllers\Room;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;


class RoomController extends Controller
{
    public function index(): View
    {

        $rooms = Room::with('users', 'user')->latest()->get()->all();


            return view('dashboard', ['rooms' => $rooms]); 
    }

    public function show(Room $room): View
    {
        $single_room = Room::with('users', 'user', 'message')->find($room->id);

        return view('room.show', [ 'room' => $single_room, 'room_id' => $room->id]);
    }

    public function create(): View
    {
        return view('room.create');
    }

    public function store(Request $request): RedirectResponse
    {


        $validate = Validator::make($request->all(), [
            "name" => 'required',
            "topic" => 'required',
            "description" => 'required',
        ]);


        if ($validate->fails()) {
            return redirect('/post/create')
                        ->withErrors($validate)
                        ->withInput();
        }
        $validated = $validate->validated();

        $validated['user_id'] = Auth::id();


        Room::create($validated);

        return redirect('/dashboard');


    }

}
