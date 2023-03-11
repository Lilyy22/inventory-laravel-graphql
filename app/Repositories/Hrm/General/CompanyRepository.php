<?php 

namespace App\Repositories\Hrm\General;

use App\Models\Hrm\General\Company;

class CompanyRepository 
{

    public static function getAll()
    {
        return Company::all();
    }

    public static function get($id)
    {
        return Company::findOrFail($id);
    }

    public static function create($company)
    {
        return Company::create($company);
    }

    public static function update($id, $company)
    {
        return Company::whereId($id)->update($company);
    }

    public static function destroy($id)
    {
        return Company::destroy($id);
    }
}