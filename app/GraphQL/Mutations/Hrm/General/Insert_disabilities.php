<?php

namespace App\GraphQL\Mutations\Hrm\General;

use App\Models\Hrm\General\Disability;
use Illuminate\Database\QueryException;

final class Insert_disabilities
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        try
        {
            $disabilities = array();
            foreach($args['input'] as $disability)
            {
                $dis = Disability::create($disability);
                array_push($disabilities, $dis);
            }

            return $disabilities;

        }catch(QueryException $e)
        {
            // return $e;
            return "something went wrong.";
        }
    }
}
