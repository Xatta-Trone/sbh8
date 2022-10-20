<?php

namespace App\Models\Admin;

use App\Enums\ContentType;
use App\Enums\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Page extends Model
{
    use HasFactory;

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'content_type' => ContentType::Page,
        'status' => Status::Draft,
    ];
}