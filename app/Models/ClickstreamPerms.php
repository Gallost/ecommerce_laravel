<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClickstreamPerms extends Model
{
    use HasFactory;
    protected $table = 'clickstream_perms';
    protected $fillable = [
        'id',
        'target',
        'click_page',
        'ip',
        'loc',
        'geoloc',
        'device'
    ];
}
