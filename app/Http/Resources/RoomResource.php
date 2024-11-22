<?php

namespace App\Http\Resources;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Room */
class RoomResource extends JsonResource
{
	public function toArray(Request $request): array
    {
		return [
			'id' => $this->id,
			'floor_number' => $this->floor_number,
			'room_number' => $this->room_number,
			'capacity' => $this->capacity,
			'status' => $this->status,
			'created_at' => $this->created_at,
			'updated_at' => $this->updated_at,
            'guests' => GuestResource::collection($this->whenLoaded('guests')),
		];
	}
}
