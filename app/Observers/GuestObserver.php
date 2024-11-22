<?php

namespace App\Observers;

use App\Exceptions\RoomIsNotAvailableException;
use App\Models\Guest;
use App\RoomStatus;

class GuestObserver
{
    /**
     * @throws RoomIsNotAvailableException
     */
    public function saving(Guest $guest): void
    {
        if (!$guest->isDirty('room_id')) {
            return;
        }

        if ($guest->room_id !== null) {
            $occupiedCapacityCount = Guest::where('room_id', $guest->room_id)->count();
            if ($occupiedCapacityCount + 1 > $guest->room->capacity) {
                throw new RoomIsNotAvailableException("Room {$guest->room_id} is occupied");
            }
            if ($guest->room->status === RoomStatus::maintenance) {
                throw new RoomIsNotAvailableException("Room {$guest->room_id} is in maintenance");
            }
        }

        if (isset($guest->room_id)) {
            $guest->room->status = RoomStatus::taken;
        } else {
            $guest->room->status = RoomStatus::maintenance;
        }
        $guest->room->save();
    }
}
