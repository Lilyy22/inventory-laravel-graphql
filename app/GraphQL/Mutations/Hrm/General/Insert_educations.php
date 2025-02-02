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
            $educations = array();
            foreach($args['input'] as $education)
            {
                $educ = Education::create($education);
                array_push($educations, $educ);
            }

            return $educations;

        }catch(QueryException $e)
        {
            // return $e;
            return "something went wrong.";
        }
    }
}
