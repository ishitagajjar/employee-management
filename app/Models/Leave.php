<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $fillabel = ['employee_id'];
    protected $guarded = [];
    protected $table = 'leaves';
    use HasFactory;
}
