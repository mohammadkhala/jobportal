<?php

namespace App\Models;
use App\Models\customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $table="appointment";
    protected $fillable = [
        'id',
        'p_id',
        'date',
        'note',
        'created_at',
        'updated_at'
    ];
    public function appointment_user(){
        return $this->belongsTo(customer::class,'p_id','personal_id');
    }

}
