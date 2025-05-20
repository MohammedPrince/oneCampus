<?php

namespace App\Repositories\User;
use App\Models\Role;
use App\Models\User;

use App\Services\User\UserServices;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRepository 
{
    public function __construct()
    {
        //
    }
    public function showRole(){
      return   $role = Role::get();
    }
public function store(array $data)
{
    try {
        // Check for existing user
        if (User::where('email', $data['email'])->exists()) {
            return [
                'success' => false,
                'message' => 'Email already exists',
            ];
        }

        if (User::where('name', $data['name'])->exists()) {
            return [
                'success' => false,
                'message' => 'Username already exists',
            ];
        }

        // Create user with role_id
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id' => $data['role'],
        ]);

        return ['success' => true];

    } catch (\Exception $e) {
        return [
            'success' => false,
            'message' => 'Registration failed: ' . $e->getMessage(),
        ];
    }
}

}
