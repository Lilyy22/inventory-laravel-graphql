<?php

namespace App\GraphQL\Mutations\Hrm\General;

use App\Models\Hrm\General\Experience;
use Illuminate\Database\QueryException;

final class Insert_experiences
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        try
        {
            $experiences = array();
            foreach($args['input'] as $experience)
            {
                $exp = Experience::create($experience);
                array_push($experiences, $exp);
            }

            return $experiences;

        }catch(QueryException $e)
        {
            // return $e;
            return "something went wrong.";
        }
    }
}
