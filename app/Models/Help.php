<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Help extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'description'];
    protected $guarded = [];
}
