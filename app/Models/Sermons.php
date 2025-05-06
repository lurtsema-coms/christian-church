<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sermons extends Model
{
    use SoftDeletes;


    protected $fillable = [
        'title',
        'description',
        'image_path',
        'audio_path',
        'created_by',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class,'created_by');
    }
}
