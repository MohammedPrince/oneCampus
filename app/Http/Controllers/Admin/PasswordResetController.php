<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\ResetPasswordRequest;
use App\Services\User\PasswordResetService;

class PasswordResetController extends Controller
{
    protected $resetService;

    public function __construct(PasswordResetService $resetService)
    {
        $this->resetService = $resetService;
    }

    public function showForm()
    {
        return view('admin.user.reset');
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        $this->resetService->resetPassword($request->validated()['user_id']);
        return redirect()->route('user.list')->with('success', 'Password reset successfully!');
    }
}
