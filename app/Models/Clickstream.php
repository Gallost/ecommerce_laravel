<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clickstream extends Model
{
    use HasFactory;
    protected $table = 'clickstream';
    protected $fillable = [
        'target',
        'click_page',
        'ip',
        'loc',
        'geoloc',
        'device',
        'user'
    ];
}
