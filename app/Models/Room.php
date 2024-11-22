<?php

namespace App\Models;

use App\RoomStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Room extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'status' => RoomStatus::class,
        ];
    }

    public function guests(): HasMany
    {
        return $this->hasMany(Guest::class, 'room_id');
    }
}
