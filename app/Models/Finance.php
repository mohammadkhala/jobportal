<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    use HasFactory;
    protected $table = 'finance';
    protected $fillable = [
        'id',
        'p_id',
        'test_id',
        'year',
        'month',
        'day',
        'amount',
        'note',
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(customer::class, 'p_id', 'personal_id');
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class, 'finance_id');
    }
}
