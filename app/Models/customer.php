<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{

    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'personal_id',
        'start_date',
        'phone',
        'address',
        'note',
        'gender',
        'created_at',
        'updated_at'
    ];

    public function appointment()
    {
        return $this->hasMany(Appointment::class, 'p_id');
    }
    public function test()
    {
        return $this->hasOne(Test::class, 'p_id');
    }

    public function finance()
    {
        return $this->hasOne(CustomerTest::class, 'p_id');
    }
}
