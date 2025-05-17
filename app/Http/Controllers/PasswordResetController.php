<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PasswordResetController extends Controller
{
    // Display the password reset form
    public function showForm()
    {
        return view('admin.user.reset');
    }

    // Handle the password reset logic
    public function resetPassword(Request $request)
    {
        // Validate the input (user_id)
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id', // Ensure the user exists
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Find the user by user_id
        $user = User::find($request->user_id);

        // Static password for resetting
        $staticPassword = 'StaticPassword123'; // Change this to your desired static password

        // Hash the static password before saving
        $user->password = Hash::make($staticPassword);
        $user->save();

        return redirect()->route('user.list')->with('success', 'Password reset successfully!');
    }
}
