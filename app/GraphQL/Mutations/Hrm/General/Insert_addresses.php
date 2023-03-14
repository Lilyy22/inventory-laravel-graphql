<?php

namespace App\GraphQL\Mutations\Hrm\General;

use App\Models\Hrm\General\Address;
use Illuminate\Database\QueryException;

final class Insert_addresses
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        try
        {
            foreach($args['input'] as $address)
            {
                Address::create($address);
            }

            return ["message" => "created"];

        }catch(QueryException $e)
        {
            // return $e;
            return ["message" => "something went wrong."];;
        }
    }
}
