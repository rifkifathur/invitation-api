<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory;
    protected $table = 'theme';
    protected $primaryKey = 'id';
    public $timestamps = false;

    // public function customer()
    // {
    //     return $this->hasMany(Customer::class);
    // }
}
