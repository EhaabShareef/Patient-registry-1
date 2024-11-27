<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Island extends Model
{

    protected $table = 'island';

    protected $fillable = [
        'name',
        'atoll',
    ];
    
    public function addresses()
    {
        return $this->hasMany(Address::class, 'island_id', 'id');
    }
}
