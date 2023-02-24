<?php 

namespace App\Repositories\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository 
{

    public static function getAll()
    {
        return User::all();
    }

    public static function create(array $user)
    {
        return User::create(
                [
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'password' => Hash::make($user['password']),
                ]);
    }

    public static function destroy($id)
    {
        return User::destroy($id);
    }

    public static function update($id, array $user)
    {
        return User::whereId($id)->update($user);
    }

    public static function get($id)
    {
        return User::find($id);
    }

    public function getUserByEmail($email)
    {
        return User::where('email', $email)->firstOrFail();
    }

    public function updatePassword($email, $password)
    {
        return User::where('email', $email)->update([
                'password' => Hash::make($password),
            ]);
    }
}