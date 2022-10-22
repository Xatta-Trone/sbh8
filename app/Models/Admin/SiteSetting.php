<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    public function getImagePathAttribute()
    {
        return $this->image ? url('uploads/site/' . $this->value) :  url('uploads/no-image.png');
    }
}