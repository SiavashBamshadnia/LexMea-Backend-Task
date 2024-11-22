<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuestRequest extends FormRequest
{
	public function rules(): array
	{
		return [
			'full_name' => ['required'],
			'age' => ['required', 'integer'],
			'room_id' => ['nullable', 'exists:rooms,id'],
		];
	}
}
