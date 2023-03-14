<?php

namespace App\GraphQL\Mutations\Hrm\General;

use App\Models\Hrm\General\Education;
use Illuminate\Database\QueryException;

final class Insert_educations
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        try
        {
            foreach($args['input'] as $education)
            {
                Education::create($education);
            }

            return ["message" => "created"];

        }catch(QueryException $e)
        {
            // return $e;
            return ["message" => "something went wrong."];;
        }
    }
}
