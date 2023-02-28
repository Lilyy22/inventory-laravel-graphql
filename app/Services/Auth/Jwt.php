<?php

namespace App\Services\Auth;

use App\Repositories\Auth\UserRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Jwt
{

    protected static $jwt_header = array("typ"=>"JWT", "alg"=>"HS256");
    
    /*
     *
     * array<string, string> $head An array with header elements to attach
     *
     * @return string A signed JWT
     *
     */
    public static function encode(array $payload, string $secret, array $header = array("typ"=>"JWT", "alg"=>"HS256"))
    {
        if(count($payload) === 0 || count($header) === 0 || $secret == '')
        {
            return null;
        }
        // change the array to json and encode to base64url
        $header_encoded = static::urlsafeB64Encode(json_encode($header));
        $payload_encoded =  static::urlsafeB64Encode(json_encode($payload));
       // $secret = env('JWT_SECRET');

        $signature = hash_hmac('SHA256',"$header_encoded.$payload_encoded", $secret, true);
        $signature_encoded =  static::urlsafeB64Encode($signature);

        return "$header_encoded.$payload_encoded.$signature_encoded";
    }
    /*
     * get jwt-token
     *
     * @return payload
     *
     */
    public static function decode($jwt, string $secret)
    {
        // return an array of strings
        $jwt_json = explode('.', $jwt);

        if (count($jwt_json) !== 3) {
           // Wrong number of segments
           return 'wrong num';
        }
        list($headerb64, $payloadb64, $signb64) =  $jwt_json;

            $sign = static::urlsafeB64Decode($signb64);
            $payload = static::urlsafeB64Decode($payloadb64);
            $header = static::urlsafeB64Decode($headerb64);
            if (null === ($sign || $payload || $header)) {
                return 'here';
            }
           
            $header = (array) json_decode($header);
            $payload = (array) json_decode($payload);

            return static::verify($header, $payload, $sign, $headerb64, $payloadb64, $secret);
    }
    /*
     * get 
     *
     * @return payload if verification is successful
     *
     */
    public static function verify(array $header, array $payload, string $sign, $headerb64, $payloadb64, $secret)
    {
        if(static::$jwt_header !== $header)
        {
            return null;  
        }

        $check_sign = hash_hmac('SHA256',"$headerb64.$payloadb64", $secret, true);
        if($sign !== $check_sign)
        {
            return null;
        }

        return $payload;
    } 
    /*
     * get user object
     *
     * @return payload if verification is successful
     *
     */
    public function getUser($jwt, $secret)
    {
       $payload = empty(static::decode($jwt, $secret)) ? false : true;

       if($payload)
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
     * encode base64url
     *
     * @return base64url
     *
     */
     
    public static function urlsafeB64Encode(string $input)
    {
        return \str_replace('=', '', \strtr(\base64_encode($input), '+/', '-_'));
    }
     /*
     * decode base64url
     *
     * @return base64url
     *
     */
     public static function urlsafeB64Decode($data)
     {
          return base64_decode(strtr($data, '-_', '+/'));
     }
}