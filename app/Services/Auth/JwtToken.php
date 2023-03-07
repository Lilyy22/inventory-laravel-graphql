<?php

namespace App\Services\Auth;

use App\Models\Auth\RefreshToken;
use App\Repositories\Auth\UserRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Services\Auth\Jwt;

class JwtToken
{

    public static $access_exp = 1800; //expiry 15 min
    public static $refresh_exp = 604800; //expiry 7 days
    
    public static function getUser($jwt, $secret)
    {
        $payload = Jwt::decode($jwt, $secret);

        if($payload !== null)
        {
            try{

                $user = UserRepository::get($payload['user_id']);
                return $user;

            }catch(ModelNotFoundException $e)
            {
                return null;
            }
        }
       
        return null;
    }
    /*
     * get user 
     *
     * return access token
     */
    public static function accessToken($user)
    {
       if($user)
       {
         $payload = array("user_id"=> $user->id, 
                            "role"=> $user->roleNames(), 
                            "iat" => time(),
                            "exp" => time() + static::$access_exp 
                        );
            return Jwt::encode($payload, env('JWT_ACCESS_KEY'));
       }
       
        return null;
    }
    /*
     * get user 
     *
     * return refresh token
     */
    public static function refreshToken($user)
    {
       if($user)
       {
        $payload = array("user_id"=> $user->id, 
                    "role"=> $user->roleNames(), 
                    "iat" => time(),
                    "exp" => time() + static::$refresh_exp 
                    );
            return Jwt::encode($payload, env('JWT_REFRESH_KEY'));
       }
       
        return null;
    }
    /*
     * get refresh token
     *
     * return stored token
     */
    public static function storeRefreshToken($refreshToken, $exp, $user_id)
    {
       return RefreshToken::updateOrCreate(
                ['user_id' => $user_id],
                [
                    'token' => $refreshToken,
                    'expires_at' => time() + $exp,
                ]);
    }
    /*
     * get refresh token 
     *
     * return user if verified
     */
    public static function verifyRefreshToken($refreshToken)
    {
        try
        {
            $token = RefreshToken::where('token', $refreshToken)->firstOrFail();
            
            return ($token->is_expired()) ? false : $token;

        }catch(ModelNotFoundException $e)
        {
            return false;
        }
    }

}