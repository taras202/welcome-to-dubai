<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leads extends Model
{
    use HasFactory;
    protected $fillable = [
        'phone',
        'email',
        'first_name',
        'last_name',
        'status',
        'call_date',
        'call_result',
        'next_call_date',
    ];
}

