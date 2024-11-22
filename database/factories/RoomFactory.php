<?php

namespace Database\Factories;

use App\Models\Room;
use App\RoomStatus;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class RoomFactory extends Factory
{
    protected $model = Room::class;

    public function definition()
    {
        return [
            'floor_number' => $this->faker->numberBetween(-5, 50),
            'room_number' => $this->faker->numberBetween(1, 10),
            'capacity' => $this->faker->randomNumber(1, 5),
            'status' => $this->faker->randomElement([RoomStatus::ready, RoomStatus::maintenance]),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
