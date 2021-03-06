<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id', 'city', 'country', 'about', 'private_gallery'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
