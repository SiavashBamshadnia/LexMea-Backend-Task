<?php

namespace App;

enum RoomStatus: string
{
    case ready = 'READY';
    case taken = 'TAKEN';
    case maintenance = 'MAINTENANCE';
}
