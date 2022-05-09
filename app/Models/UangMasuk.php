<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UangMasuk extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'tanggal', 'nominal',
    ];
}
