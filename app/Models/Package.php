<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = ['package_number', 'package_status', 'package_imei', 'package_comments', 'package_client'];
}