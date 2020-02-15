<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $guarded = [];

    public function profileImage()
    {

        $ImagePath = ($this->image) ? $this->image : 'Profile/Ms0s307lji9hXZQ51YCW7seAe8t725ylFCPbx13o.jpeg';
        return '/storage/' . $ImagePath;
    }

    public function followers()
    {
        return $this->belongsToMany(User::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
