<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'token',
        'user_id',
        'address',
        'phone',
        'email',
        'post_code',
        'gender',
        'birth_date',
        'birth_city',
        'nationality',
        'company_name',
        'bank_name',
        'iban',
        'bank_code',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function clients()
    {
        return $this->hasMany(Client::class);
    }
}
