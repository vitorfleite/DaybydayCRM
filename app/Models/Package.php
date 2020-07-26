<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = ['package_number', 'package_status', 'package_imei', 'package_comments', 'package_client', 'user_assigned_id', 'client_id'];

    public function clients()
    {
        $this->belongsTo(Client::class, 'client_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_assigned_id');
    }
        public function getAssignedUserAttribute()
    {
        return User::findOrFail($this->user_assigned_id);
    }
}