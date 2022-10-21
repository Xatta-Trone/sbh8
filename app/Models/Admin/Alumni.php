<?php

namespace App\Models\Admin;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Alumni extends Model
{
    use HasFactory;

    public function getImagePathAttribute()
    {
        return $this->image ? url('uploads/' . $this->image) :  url('uploads/no-image.png');
    }

    public function getSlugAttribute()
    {
        return $this->id . '-' . Str::slug($this->name);
    }
}