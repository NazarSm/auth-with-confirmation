<?php

namespace App\Actions\Fortify;

use App\Models\Client;
use App\Models\User;
use App\Repositories\AgentRepository;
use App\Repositories\ClientRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Laravel\Fortify\Contracts\CreatesNewUsers;


class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    protected $clientRepository;
    protected $agentRepository;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function __construct(ClientRepository $clientRepository, AgentRepository $agentRepository)
    {
        $this->clientRepository = $clientRepository;
        $this->agentRepository = $agentRepository;

    }

    public function create(array $input)
    {
        //dd($input);
        $input['role'] == 'client'
            ? $this->clientRepository->validateData($input)
            : $this->agentRepository->validateData($input);

        //dd(123);

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password'])
        ]);

        if ($user->id && $input['role'] == 'client') {
            $this->clientRepository->createProfileClient($input, $user->id);

        }else if($user->id && $input['role'] == 'agent'){
            $this->agentRepository->createProfileClient($input, $user->id);
        }

        return $user;
    }

}
