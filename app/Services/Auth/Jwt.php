<?php

namespace App\Services\Auth;

class Jwt
{

    protected static $jwt_header = array("typ"=>"JWT", "alg"=>"HS256");  
    /*
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
     *
     * @return payload if verified
     *
     */
    public static function decode($jwt, string $secret)
    {
        // return an array of strings
        $jwt_json = explode('.', $jwt);

        if (count($jwt_json) !== 3) {
           // Wrong number of segments
           return null;
        }
        list($headerb64, $payloadb64, $signb64) =  $jwt_json;

            $sign = static::urlsafeB64Decode($signb64);
            $payload = static::urlsafeB64Decode($payloadb64);
            $header = static::urlsafeB64Decode($headerb64);

            if (null === ($sign || $payload || $header)) {
                return null;
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

        if(array_key_exists('iat', $payload)  && array_key_exists('exp', $payload))
        {
            if($payload['exp'] < time())
            {
                return null;
            }
            return $payload;

        }
        return null;

    } 
    /*
     * 
     * @return base64url
     *
     */
    public static function urlsafeB64Encode(string $input)
    {
        return \str_replace('=', '', \strtr(\base64_encode($input), '+/', '-_'));
    }
     /*
     * 
     * @return base64url
     *
     */
     public static function urlsafeB64Decode($data)
     {
        return base64_decode(strtr($data, '-_', '+/'));
     }
    
     
}