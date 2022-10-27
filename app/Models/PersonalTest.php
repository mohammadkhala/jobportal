<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalTest extends Model
{
    use HasFactory;
    protected $table = 'p_test';
    protected $fillable = [
        'id',
        'p_id',
        'distance',
        'Right_eye_degree',
        'left_eye_degree',
        'year',
        'month',
        'day',
        'report',
        'cost',
        'attach',
        'test_id',
        'created_at',
        'updated_at',
    ];
    public function test()
    {
        return $this->belongsTo(Test::class, 'test_id', 'id');
    }
    public function person()
    {
        return $this->belongsTo(customer::class, 'p_id', 'personal_id');
    }
}
