<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'type',
        'section_id',
        'date',
        'time',
        'location',
        'reg_fee',
        'description',
        'options',
        'poster',
        'status',
    ];
}
