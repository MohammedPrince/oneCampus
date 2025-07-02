<?php
namespace App\Services\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PasswordResetService
{
    public function resetPassword(int $userId): void
    {
        $user = User::findOrFail($userId);
        $user->password = Hash::make('StaticPassword123'); // Use config or env value in real projects
        $user->save();
    }
}
