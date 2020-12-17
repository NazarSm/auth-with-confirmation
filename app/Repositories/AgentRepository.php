<?php


namespace App\Repositories;

use Illuminate\Support\Facades\Validator;
use App\Models\Agent;
use Illuminate\Support\Str;

class AgentRepository
{
    public function createProfileClient($data, $userId)
    {
        Agent::create([
            'name'    => $data['name'],
            'surname'    => $data['surname'],
            'token'    => Str::random(18),
            'user_id'    => $userId,
            'address'    => $data['address'],
            'phone'    => $data['phone'],
            'email'    => $data['email'],
            'post_code'    => $data['post_code'],
            'gender'    => $data['gender'],
            'birth_date'    => $data['birth_date'],
            'birth_city'    => $data['birth_city'],
            'nationality'    => $data['nationality'],
            'company_name'    => $data['company_name'],
            'bank_name'    => $data['bank_name'],
            'iban'    => $data['iban'],
            'bank_code'    => $data['bank_code'],
        ]);
    }

    public function validateData($data)
    {
        $rules = $this->getRulesValidation();
        return Validator::make($data, $rules)->validate();

    }
    protected  function getRulesValidation()
    {
        return $rules = [
            'name'                    => 'required|string|min:2|max:64',
            'surname'                 => 'required|string|min:2|max:64',
            'address'                 => 'required|string|min:2|max:128',
            'phone'                   => 'required|digits_between:6,20',
            'email'                   => 'required|string|max:191|unique:users|email',
            'post_code'               => 'required|digits_between:4,10',
            'gender'                  => 'required|string|max:3',
            'birth_date'              => 'required',
            'birth_city'              => 'required|string|min:2|max:64',
            'nationality'             => 'required|string|min:2|max:64',
            'company_name'            => 'required|string|min:2|max:64',
            'bank_name'               => 'required|string|min:2|max:64',
            'iban'                    => 'required|string|min:5|max:14',
            'bank_code'               => 'required|string|min:6|max:64',
        ];
    }
}
