<?php

namespace App\GraphQL\Mutations\Hrm\General;

use App\Models\Hrm\General\Family;
use Illuminate\Database\QueryException;

final class Insert_families
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        try
        {
            $families = array();
            foreach($args['input'] as $family)
            {
                $fam = Family::create($family);
                array_push($families, $fam);
            }

            return $families;

        }catch(QueryException $e)
        {
            // return $e;
            return "something went wrong.";
        }
    }
}
