<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $table = 'history';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'city',
        'history_weather',
    ];

    protected $visible = [
        'id',
        'city',
        'history_weather',
        'created_at',
        'updated_at',
    ];

}
