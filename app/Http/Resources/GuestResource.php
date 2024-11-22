<?php

namespace App\Http\Resources;

use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Guest */
class GuestResource extends JsonResource
{
	public function toArray(Request $request)
	{
		return [
			'id' => $this->id,
			'full_name' => $this->full_name,
			'age' => $this->age,
			'created_at' => $this->created_at,
			'updated_at' => $this->updated_at,

			'room_id' => $this->room_id,

			'room' => new RoomResource($this->whenLoaded('room')),
		];
	}
}
