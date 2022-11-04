<?php

namespace App\Models;
use App\Models\customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    //protected $table="appointment";
    protected $fillable = [
        'id',
        'customer_id',
        'date',
        'note',
        'created_at',
        'updated_at'
    ];
    public function customer(){
        return $this->belongsTo(customer::class);
    }

}
