<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WaGroup extends Model
{
    protected $fillable = [
        'angkatan',
        'link_group',
        'nama_group',
    ];
}

