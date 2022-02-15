<?php

namespace Comasy\Menu\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function items()
    {
        return $this->hasMany(MenuItem::class);
    }
}
