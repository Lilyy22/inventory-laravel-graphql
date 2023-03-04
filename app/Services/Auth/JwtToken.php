<?php

namespace App\Services\Auth;

use App\Models\Auth\RefreshToken;
use App\Repositories\Auth\UserRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Services\Auth\Jwt;

class JwtToken
{

    public static $access_exp = 1800; //expires after 15 min
    public static $refresh_exp = 604800; //expires after 7 days
     /*
     * get user object
     *
     */
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
                            "role"=> "user", 
                            "iat" => time(),
                            "exp" => time() + static::$access_exp //expires after 15 min
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
                    "role"=> "user", 
                    "iat" => time(),
                    "exp" => time() + static::$refresh_exp //expires after 7 days
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
            
            return ($token->expires_at < time()) ? false : $token;
            

        }catch(ModelNotFoundException $e)
        {
            return false;
        }
    }

}