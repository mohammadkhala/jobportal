<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Test extends Model
{
    use HasFactory;
    protected $table='test';
    protected $fillable = [
        'id',
        'p_id',
        'description',
        'info_mid',
        'created_at',
        'updated_at'
    ];


    public function p_test()
    {
        return $this->hasMany(PersonalTest::class, 'p_id');
    }


    public function customer()
    {
        return $this->belongsTo(Customer::class, 'p_id', 'personal_id');
    }
}
