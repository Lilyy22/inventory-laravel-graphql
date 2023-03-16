<?php

namespace App\GraphQL\Mutations\Hrm\General;

use App\Models\Hrm\General\Language;
use Illuminate\Database\QueryException;

final class Insert_languages
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        try
        {
            $languages = array();
            foreach($args['input'] as $language)
            {
                $lang = Language::create($language);
                array_push($languages, $lang);
            }

            return $languages;

        }catch(QueryException $e)
        {
            // return $e;
            return "something went wrong.";
        }
    }
}
