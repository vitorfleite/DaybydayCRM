<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConnectedCar extends Model
{
    protected $fillable = ['connectedcar_name', 'connectedcar_model', 'connectedcar_color', 'connectedcar_vin', 'connectedcar_year', 'connectedcar_plate', 'connectedcar_comments', 'connectedcar_package'];
}
