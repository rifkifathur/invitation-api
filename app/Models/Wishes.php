<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishes extends Model
{
    use HasFactory;
    protected $table = 'wishes';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
