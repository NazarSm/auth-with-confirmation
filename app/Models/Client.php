<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Client extends Model
{

    protected $fillable = [
        'name',
        'user_id',
        'agent_id',
        'password',
        'email',
        'phone',
        'company_name',
        'siret_number',
        'address',
        'post_code',
        'gender',
        'first_name',
        'contract_signature_date',
        'total_transactions',
        'logo',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

}
