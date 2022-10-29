<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{

    use HasFactory;
    protected $primaryKey='personal_id';
    protected $fillable = [

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
        return $this->hasMany(Appointment::class, 'personal_id');
    }
    public function test()
    {
        return $this->hasOne(Test::class, 'id');
    }

    public function finance()
    {
        return $this->hasOne(Finance::class, 'id');
    }
}
