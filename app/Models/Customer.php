<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customer';
    protected $primaryKey = 'id';
    protected $hidden =['theme_id'];
    public $timestamps = false;

    // public function theme(){
    //     return $this->hasMany('App\Theme');
    // }

    /**
     * Get the user that owns the Customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }

    public function gallery()
    {
        return $this->hasMany(Gallery::class);
    }

    public function wishes()
    {
        return $this->hasMany(Wishes::class);
    }

    public function stories()
    {
        return $this->hasMany(Stories::class);
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class, 'man_bank_id');
    }
    
    public function bank2()
    {
        return $this->belongsTo(Bank::class, 'woman_bank_id');
    }
}
