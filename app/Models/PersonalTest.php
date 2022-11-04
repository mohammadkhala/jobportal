<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalTest extends Model
{
    use HasFactory;
    protected $table = 'p_tests';
    protected $fillable = [
        'id',
        'customer_id',
        'distance',
        'right_eye_degree',
        'left_eye_degree',
        'date',
        // 'month',
        // 'day',
        'report',
        'cost',
        'attach',
        'test_id',
        'created_at',
        'updated_at',
    ];
    public function test()
    {
        return $this->belongsTo(Test::class);
    }
    public function customer()
    {
        return $this->belongsTo(customer::class);
    }
    public function scopeSelection($query)
    {
        return $query->select(
            'customer_id',
            'distance',
            'right_eye_degree',
            'left_eye_degree',
            'date',
            // 'month',
            // 'day',
            'report',
            'cost',
            'attach',
            'test_id',
        );
    }
}
