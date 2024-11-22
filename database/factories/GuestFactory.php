<?php

namespace Database\Factories;

use App\Models\Guest;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class GuestFactory extends Factory
{
	protected $model = Guest::class;

	public function definition()
	{
		return [
			'full_name' => $this->faker->name(),
			'age' => $this->faker->randomNumber(),
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),

//			'room_id' => Room::factory(),
		];
	}
}
