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
            $addresses = array();
            foreach($args['input'] as $address)
            {
                $addr = Address::create($address);
                array_push($addresses, $addr);
            }

            return $addresses;

        }catch(QueryException $e)
        {
            // return $e;
            return "something went wrong.";
        }
    }
}
