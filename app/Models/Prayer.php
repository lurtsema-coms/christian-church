<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prayer extends Model
{
    protected $guarded = [];

    public function scopeApproved($query)
    {
        return $query->where('is_approved', 1)->orderBy('created_at', 'desc');
    }
}
