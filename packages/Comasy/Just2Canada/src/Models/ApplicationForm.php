<?php

namespace Comasy\J2C\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationForm extends Model
{
    use HasFactory;

    protected $dates = ['created_at'];

    public function typable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
