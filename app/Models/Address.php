<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'address';

    protected $fillable = [
        'island_id',
        'street',
        'city',
        'house_name',
    ];

    public function patientRegistry()
    {
        return $this->hasMany(PatientRegistry::class,'address_id', 'id');
    }

    public function island()
    {
        return $this->belongsTo(Island::class, 'island', 'id');
    }
}
