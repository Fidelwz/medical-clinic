<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;
    protected $table = 'office';
    public $timestamps = true;
    protected $pirmaryKey = 'id';
    protected $fillable = [
        'name',
        'description',
        'created_at',

    ];
}
