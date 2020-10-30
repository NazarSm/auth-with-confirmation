<?php

namespace App\Actions\Fortify;

use App\Http\Logger\TimeUserRegistrationLogger;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;


class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    public $userRegistrationLog;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function __construct(TimeUserRegistrationLogger $timeUserRegistrationLogger  )
    {
        $this->userRegistrationLog = $timeUserRegistrationLogger;
    }

    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        $this->userRegistrationLog->timeUserRegistration($user);

        return $user ;
    }
}
