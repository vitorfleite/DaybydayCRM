<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Simcard extends Model
{
    protected $fillable = ['simcard_number', 'simcard_status', 'simcard_origin', 'simcard_operator', 'simcard_comments', 'simcard_client'];

}
