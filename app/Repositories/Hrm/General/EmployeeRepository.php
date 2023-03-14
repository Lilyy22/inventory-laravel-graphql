<?php 

namespace App\Repositories\Hrm\General;

use App\Models\Hrm\General\Employee;

class EmployeeRepository 
{

    public static function getAll()
    {
        return Employee::all();
    }

    public static function get($id)
    {
        return Employee::findOrFail($id);
    }

    public static function create($employee, $user_id)
    {
        return Employee::create($employee);

    }

    public static function update($id, $employee)
    {
        return Employee::whereId($id)->update($employee);
    }

    public static function getApprovedEmployee()
    {
        return Employee::where('is_approved', true)->firstOrFail();
    }

    public static function getUnApprovedEmployee()
    {
        return Employee::where('is_approved', false)->firstOrFail();
    }

    public static function destroy($id)
    {
        return Employee::destroy($id);
    }
}