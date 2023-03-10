<?php

namespace App\Actions\Fortify;

use App\Models\Admin;
use App\Models\User;
use App\Models\Wallet;
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
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {

        $this->validation($input);
        $model = $this->createAccount($input);
        return $model;
    }

    public function validation($input)
    {
        if(config('fortify.guard') == 'admin' && request()->is('admin/*')){$model = Admin::class;}
        if(config('fortify.guard') == 'web' && request()->is('/*')){$model = User::class;}

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [ 'required', 'string', 'email', 'max:255', Rule::unique($model),],
            'phone_number' => ['required', 'string', 'max:15', 'unique:'.$model.',phone_number'],
            'status' => ['required', 'in:active,inactive'],
            'role' => ['required', 'in:admin,superadmin'],
            'username' => ['required', 'string', 'max:255', Rule::unique($model)],
            'password' => $this->passwordRules(),
        ])->validate();
    }

    public function createAccount($input)
    {
        if(config('fortify.guard') == 'admin' && request()->is('admin/*'))
        {
            return Admin::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'phone_number' => $input['phone_number'],
                'status' => $input['status'],
                'role' => $input['role'],
                'username' => $input['username'],
                'password' => Hash::make($input['password']),
            ]);
        }

        if(config('fortify.guard') == 'admin' && request()->is('/*'))
        {
            $user = User::create([
                'admin_id' => auth()->guard('admin')->id(),
                'name' => $input['name'],
                'email' => $input['email'],
                'phone_number' => $input['phone_number'],
                'status' => $input['status'],
                'role' => $input['role'],
                // 'username' => $input['username'],
                'password' => Hash::make($input['password']),
            ]);

            $wallet =  Wallet::create([
                'admin_id' => 1,
                'user_id' => $user->id,
                'balance' => 0,
                'total_deposit' => 0,
                'total_withdraw' => 0,
                'points' => 0,
            ]);

            return $user;
        }

    }

}
