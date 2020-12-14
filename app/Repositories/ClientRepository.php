<?php


namespace App\Repositories;


use App\Models\Client;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ClientRepository
{

    public function createProfileClient($data, $userId)
    {
        //to service
        $pathPhoto = $this->storePhoto($data['photo']);

        $client = Client::create([
            'name' => $data['name'],
            'user_id' => $userId,
            'agent_id' => $data['agent_id'] ?? null,
            'email' => $data['email'],
            'phone' => $data['phone'],
            'company_name' => $data['company_name'],
            'siret_number' => $data['siret_number'],
            'address' => $data['address'],
            'gender' => $data['gender'],
            'first_name' => $data['first_name'],
            'logo' => $pathPhoto,
        ]);
        $client->categories()->attach($data['categories']);
    }

    protected function storePhoto($photo)
    {
        $fileExtension = $photo->clientExtension();
        $path = sprintf("%s/%s.%s", 'photo', Str::random(25), $fileExtension);
        $photo->move(storage_path('app/public/photo'), $path);

        return $path;
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
            'agent_id'                => 'nullable|numeric|exists:agents,id',
            'email'                   => 'required|string|max:191|unique:users|email',
            'address'                 => 'required|string|min:2|max:128',
            'phone'                   => 'required|digits_between:6,20',
            'siret_number'            => 'required|digits:14',
            'company_name'            => 'required|string|min:2|max:64',
            'photo'                   => 'required|image|max:2048',
            'gender'                  => 'required|string|max:3',
            'first_name'              => 'required|string|min:2|max:64',
            'categories'              => 'array',
            'categories.0'            => 'required|numeric|exists:categories,id',
            'categories.1'            => 'nullable|numeric|exists:categories,id',
            'password'                => 'required|string|min:8|confirmed',
            'password_confirmation'   => 'required|string|min:8',
        ];
    }
}
