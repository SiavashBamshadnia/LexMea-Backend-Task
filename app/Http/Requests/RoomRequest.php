<?php

namespace App\Http\Requests;

use App\RoomStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class RoomRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'floor_number' => ['required', 'integer'],
            'room_number' => ['required', 'integer'],
            'capacity' => ['required', 'integer'],
            'status' => [new Enum(RoomStatus::class)],
        ];
    }
}
