<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClickstreamRaw extends Model
{
    use HasFactory;
    protected $table = 'clickstream_raw';
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
