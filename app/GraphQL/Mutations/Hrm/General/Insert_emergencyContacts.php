<?php

namespace App\GraphQL\Mutations\Hrm\General;

use App\Models\Hrm\General\EmergencyContact;
use Illuminate\Database\QueryException;

final class Insert_emergencyContacts
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        try
        {
            $emergencies = array();
            foreach($args['input'] as $emergency)
            {
                $emerg = EmergencyContact::create($emergency);
                array_push($emergencies, $emerg);
            }

            return $emergencies;

        }catch(QueryException $e)
        {
            // return $e;
            return "something went wrong.";
        }
    }
}
