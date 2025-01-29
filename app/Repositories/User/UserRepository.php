<?php

namespace App\Repositories\User;
use App\Models\Role;
use App\Models\User;

use App\Services\User\UserServices;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserServices
{
    public function __construct()
    {
        //
    }
    public function showRole(){
      return   $role = Role::get();
    }
    public function store(array $data){
     return $createUser =  User::create($data);
    }
    //
}
