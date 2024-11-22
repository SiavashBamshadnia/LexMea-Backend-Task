<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuestRequest;
use App\Http\Resources\GuestResource;
use App\Models\Guest;
use App\Models\Room;

class GuestController extends Controller
{
	public function index()
	{
		return GuestResource::collection(Guest::all());
	}

	public function store(GuestRequest $request)
	{
		return new GuestResource(Guest::create($request->validated()));
	}

	public function show(Guest $guest)
	{
		return new GuestResource($guest);
	}

	public function update(GuestRequest $request, Guest $guest)
	{
		$guest->update($request->validated());

		return new GuestResource($guest);
	}

	public function destroy(Guest $guest)
	{
		$guest->delete();

		return response(status: 204);
	}

	public function assignRoom(Guest $guest)
	{
		$room = room::findOrFail(request()->post('room-id'));

		$guest->room_id = $room->id;
		$guest->save();

		return response(status: 204);
	}

	public function deassignRoom(Guest $guest)
	{
		$guest->room_id = null;
		$guest->save();

		return response(status: 204);
	}
}
