<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'no_telepon' => ['required', 'string', 'max:15'], // 🔥 validasi nomor telepon
            'password' => $this->passwordRules(),
            'role' => ['required', 'in:pelanggan'],
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'no_telepon' => $input['no_telepon'], // 🔥 simpan nomor telepon
            'password' => Hash::make($input['password']),
            'role' => 'pelanggan',
        ]);
    }
}
