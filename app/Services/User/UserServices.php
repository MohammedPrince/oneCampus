<?php
namespace App\Services\User;

use App\Models\User;
use App\Repositories\User\UserRepository;
use Illuminate\Support\Facades\Hash;

class UserServices
{
    protected $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }
    public function store(array $data)
    {
      return  $this->userRepo->store( $data);
        // Extra safety in case controller didn't validate unique
       
    }

    public function showRole()
    {
        return \App\Models\Role::all();
    }
}
