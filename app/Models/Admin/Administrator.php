<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrator extends Model
{
    use HasFactory;


    public function getImagePathAttribute()
    {
        return $this->image ? url('uploads/' . $this->image) :  url('uploads/no-image.png');
    }
}