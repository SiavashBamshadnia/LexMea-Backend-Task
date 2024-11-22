<?php

namespace App\Models;

use App\Observers\GuestObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[ObservedBy([GuestObserver::class])]
class Guest extends Model
{
	use HasFactory;

	protected $guarded = [];

	public function room(): BelongsTo
	{
		return $this->belongsTo(Room::class);
	}
}
