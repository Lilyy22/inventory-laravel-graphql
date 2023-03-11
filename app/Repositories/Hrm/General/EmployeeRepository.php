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
        return Employee::create([
                'first_name'=> $employee['first_name'],
                'last_name'=> $employee['last_name'],
                'grand_father_name'=> $employee['grand_father_name'],
                'birth_date'=> $employee['birth_date'],
                'birth_place'=> $employee['birth_place'],
                'religion'=> $employee['religion'],
                'gender'=> $employee['gender'],
                'nationality'=> $employee['nationality'],
                'marital_status'=> $employee['marital_status'],
                'additional_skill'=> $employee['additional_skill'],
                'department_id'=> $employee['department_id'],
                'user_id' => $user_id,
                'is_approved' => false
             ]);

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