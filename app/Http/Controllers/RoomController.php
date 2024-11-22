<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomRequest;
use App\Http\Resources\RoomResource;
use App\Models\Room;
use App\RoomStatus;

class RoomController extends Controller
{
    public function index()
    {
        return RoomResource::collection(Room::with('guests')->get());
    }

    public function store(RoomRequest $request)
    {
        return new RoomResource(Room::create($request->validated()));
    }

    public function show(Room $room)
    {
        return new RoomResource($room);
    }

    public function update(RoomRequest $request, Room $room)
    {
        $room->update($request->validated());

        return new RoomResource($room);
    }

    public function destroy(Room $room)
    {
        $room->delete();

        return response(status: 204);
    }

    public function setAsReady(Room $room)
    {
        $room->update(['status' => RoomStatus::ready]);

        return response(status: 204);
    }
}
