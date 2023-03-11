<?php 

namespace App\Repositories\Hrm\General;

use App\Models\Hrm\General\Department;

class DepartmentRepository 
{

    public static function getAll()
    {
        return Department::all();
    }

    public static function get($id)
    {
        return Department::findOrFail($id);
    }

    public static function create($department)
    {
        return Department::create($department);
    }

    public static function update($id, $department)
    {
        return Department::whereId($id)->update($department);
    }

    public static function destroy($id)
    {
        return Department::destroy($id);
    }
}