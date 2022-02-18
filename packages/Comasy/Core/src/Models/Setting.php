<?php

namespace Comasy\Core\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $guarded = [];
    protected $casts = [
        'value' => 'array'
    ];
    use HasFactory;
}
